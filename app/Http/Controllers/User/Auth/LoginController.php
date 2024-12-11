<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use Auth;
use Hash;
use App\Models\Apptitle;
use App\Models\Footertext;
use App\Models\Pages;
use App\Traits\SocialAuthSettings;
use GuzzleHttp\Client;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialAuthSetting;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Seosetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Response;
use GeoIP;
use App\Models\VerifyUser;
use Mail;
use App\Mail\mailmailablesend;
use App\Models\Announcement;
use App\Models\VerifyOtp;
use PragmaRX\Google2FA\Google2FA;
use App\Models\CustomerSetting;
use App\Models\User;
use App\Models\Holiday;

class LoginController extends Controller

{
  use SocialAuthSettings, ThrottlesLogins, AuthenticatesUsers;

    public function showLoginForm()
    {

        $title = Apptitle::first();
        $data['title'] = $title;

        $socialAuthSettings = SocialAuthSetting::first();
        $data['socialAuthSettings'] = $socialAuthSettings;

        $now = now();
        $announcement = announcement::whereDate('enddate', '>=', $now->toDateString())->whereDate('startdate', '<=', $now->toDateString())->get();
        $data['announcement'] = $announcement;

        $announcements = Announcement::whereNotNull('announcementday')->get();
        $data['announcements'] = $announcements;

        $holidays = Holiday::whereDate('startdate', '<=', $now->toDateString())->whereDate('enddate', '>=', $now->toDateString())->get();
        $data['holidays'] =  $holidays;

        $seopage = Seosetting::first();
        $data['seopage'] = $seopage;

        if(setting('only_social_logins') == 'on'){
            return view('user.auth.onlysociallogin')->with($data);
        }

        return view('user.auth.login')->with($data);
    }


    public function emailverification(Request $request)
    {
        $title = Apptitle::first();
        $data['title'] = $title;

        $socialAuthSettings = SocialAuthSetting::first();
        $data['socialAuthSettings'] = $socialAuthSettings;

        $seopage = Seosetting::first();
        $data['seopage'] = $seopage;

        $now = now();
        $announcement = announcement::whereDate('enddate', '>=', $now->toDateString())->whereDate('startdate', '<=', $now->toDateString())->get();
        $data['announcement'] = $announcement;

        $announcements = Announcement::whereNotNull('announcementday')->get();
        $data['announcements'] = $announcements;

        $holidays = Holiday::whereDate('startdate', '<=', $now->toDateString())->whereDate('enddate', '>=', $now->toDateString())->get();
        $data['holidays'] =  $holidays;

        return view('user.auth.emailverify')->with($data);
        // $unverifiedCustomer = Customer::where('email', $request->email)->first();
    }


    public function emailverificationstore(Request $request)
    {
        $user = Customer::where('email', '=', $request->email)->first();

        $existVerifyUser = VerifyUser::where('cust_id',$user->id)->get();
        if($existVerifyUser != null){
            foreach($existVerifyUser as $existVerifyUsers){
                $existVerifyUsers->delete();
            }
        }

        $verifyUser = VerifyUser::create([
            'cust_id' => $user->id,
            'token' => sha1(time())
        ]);

        $verifyData = [
            'username' => $user->username,
            'email' => $user->email,
            'email_verify_url' => route('verify.email',$verifyUser->token),
        ];

        try{

            Mail::to($user->email)
            ->send( new mailmailablesend( 'customer_sendmail_verification', $verifyData ) );


        }catch(\Exception $e){

            return redirect()->route('auth.login');
        }

        return redirect()->route('auth.login');
    }


    public function login(Request $request)
    {
        $email = $request->email;
        $completeDomain = substr(strrchr($email, "@"), 1);
        $emaildomainlist = setting('EMAILDOMAIN_LIST');
        $emaildomainlistArray = explode(",", $emaildomainlist);

        if(setting('EMAILDOMAIN_BLOCKTYPE') == 'blockemail'){
            if (in_array($completeDomain, $emaildomainlistArray)) {
                return redirect()->back()->with('error',lang('Your domain is blocked.', 'alerts'));
            }
        }

        if(setting('EMAILDOMAIN_BLOCKTYPE') == 'allowemail'){
            if (!in_array($completeDomain, $emaildomainlistArray)) {
                return redirect()->back()->with('error',lang('Your domain is blocked.', 'alerts'));
            }
        }

        if(setting('login_disable') == 'off')
        {


            if(setting('CAPTCHATYPE') == 'off'){
                $request->validate([
                    'email'     => 'required|exists:customers|max:255',
                    'password'  => 'required|min:6|max:255',

                ]);
            }else{
                if(setting('CAPTCHATYPE') == 'manual'){
                    if(setting('RECAPTCH_ENABLE_LOGIN')=='yes'){
                        $this->validate($request, [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                            'captcha' => ['required', 'captcha'],

                        ]);
                    }else{
                        $this->validate($request, [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                        ]);
                    }

                }
                if(setting('CAPTCHATYPE') == 'google'){
                    if(setting('RECAPTCH_ENABLE_LOGIN')=='yes'){
                        $this->validate($request, [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                            'g-recaptcha-response' => 'required|captcha',


                        ]);
                    }else{
                        $this->validate($request, [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                        ]);
                    }
                }
            }

            $credentials  = $request->only('email', 'password');
            $customerExist = Customer::where(['email' => $request->email, 'status' => 0])->exists();

            if ($customerExist) {
                return redirect()->back()->with('error',lang('The account has been deactivated.', 'alerts'));
            }

            $unverifiedCustomer = Customer::where('email', $request->email)->first();

            if (!empty($unverifiedCustomer) && $unverifiedCustomer->verified == 0) {
                return redirect()->back()->with('error',lang('Your email has not been verified. Please verify your email.', 'alerts'));
            }

            if (empty($unverifiedCustomer)) {
                return redirect()->back()->with('error',lang('This email is not registered.', 'alerts'));
            }

            if (Auth::guard('customer')->attempt($credentials)) {

                $cust = Customer::find(Auth::guard('customer')->id());
                $geolocation = GeoIP::getLocation(request()->getClientIp());
                $cust->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $geolocation->ip,
                    'last_logins_at' => Carbon::now()->toDateTimeString(),
                ]);
                $request->session()->put('customerticket', Auth::id());

                return redirect()->route('client.dashboard');
            }

            return back()->withInput()->withErrors(['email' => lang('Invalid email or password', 'alerts')]);
        }
        else
        {
            return back()->withInput()->withErrors(['email' => lang('Techincal Issue', 'alerts')]);
        }

    }

    public function verifytwofactor(Request $request, $email)
    {

        $title = Apptitle::first();
        $data['title'] = $title;

        $seopage = Seosetting::first();
        $data['seopage'] = $seopage;

        $footertext = Footertext::first();
        $data['footertext'] = $footertext;

        $now = now();
        $announcement = announcement::whereDate('enddate', '>=', $now->toDateString())->whereDate('startdate', '<=', $now->toDateString())->get();
        $data['announcement'] = $announcement;

        $holidays = Holiday::whereDate('startdate', '<=', $now->toDateString())->whereDate('enddate', '>=', $now->toDateString())->get();
        $data['holidays'] =  $holidays;

        $announcements = Announcement::whereNotNull('announcementday')->get();
        $data['announcements'] = $announcements;

        $data['email'] = $email;

        if(session()->has('twofactoremail')){
            return redirect()->route('client.dashboard');
        }

        $verifyotp = VerifyOtp::where('cust_id',$request->email)->first();
        if(!$verifyotp){
            $verifyOtp = VerifyOtp::create([
                'cust_id' => $email,
                'otp' => rand(100000, 999999),
                'type' => 'twofactorotp',
            ]);

            $guestticket = [

                'otp' => $verifyOtp->otp,
                'guestemail' => $verifyOtp->cust_id,
                'guestname' => 'customer',
            ];
            try {

                Mail::to($verifyOtp->cust_id)
                    ->send(new mailmailablesend('two_factor_authentication_otp_send', $guestticket));

            } catch (\Exception$e) {


            }
        }
        return view('user.auth.passwords.twofactor')->with($data);
    }

    public function resendotp(Request $request){
        if ($request->session()->has('twofactoremail')) {
            return redirect()->route('client.dashboard');
        }

        $verifyUser = VerifyOtp::where('cust_id',$request->email)->first();
        if ($verifyUser) {
            $verifyUser->otp = rand(100000, 999999);
            $verifyUser->update();
        }

        $guestticket = [
            'otp' => $verifyUser->otp,
            'guestemail' => $verifyUser->cust_id,
            'guestname' => 'customer',
        ];
        try {

            Mail::to($verifyUser->cust_id)
                ->send(new mailmailablesend('two_factor_authentication_otp_send', $guestticket));

        } catch (\Exception$e) {

            // return response()->json(['success' => lang('Please check your Email', 'alerts'), 'email' => 'exists']);
        }
        return redirect()->route('verify.twofactor',['email'=>$verifyUser->cust_id]);
    }

    public function otpverify(Request $request)
    {
        $verifyUser = VerifyOtp::where('cust_id',$request->email)->where('otp', $request->otp)->first();
        if ($request->session()->has('twofactoremail')) {
            return redirect()->route('client.dashboard');
        }
        if(User::where(['id' =>Auth::id(), 'twofactorauth' => 'emailtwofact'])->exists()){
            if ($request->session()->has('admintwofactoremail')) {
                return redirect()->route('admin.dashboard');
            }
        }
        if ($verifyUser) {
            $verifyUser->delete();
            if(User::where(['id' =>Auth::id(), 'twofactorauth' => 'emailtwofact'])->exists()){
                session()->put('admintwofactoremail',$request->email);
                return redirect()->route('admin.dashboard');
            }
            $twofactor = session()->put('twofactoremail',$request->email);
            return redirect()->route('client.dashboard');
        }else{
            return redirect()->back()->with(['error' => lang('Invalid otp.', 'alerts')]);
        }
    }

    public function ajaxlogin(Request $request)
    {
        if(setting('REGISTER_POPUP') == 'no'){
            dd('yes it is ajaxlogin');
        }

        $email = $request->email;
        $completeDomain = substr(strrchr($email, "@"), 1);
        $emaildomainlist = setting('EMAILDOMAIN_LIST');
        $emaildomainlistArray = explode(",", $emaildomainlist);

        if(setting('EMAILDOMAIN_BLOCKTYPE') == 'blockemail'){
            if (in_array($completeDomain, $emaildomainlistArray)) {
                return Response::json(['errors' => lang('Your domain is blocked.', 'alerts')]);
            }
        }

        if(setting('EMAILDOMAIN_BLOCKTYPE') == 'allowemail'){
            if (!in_array($completeDomain, $emaildomainlistArray)) {
                return Response::json(['errors' => lang('Your domain is blocked.', 'alerts')]);
            }
        }

        if(setting('login_disable') == 'off')
        {
            if(setting('CAPTCHATYPE') == 'off'){
                $validator = Validator::make($request->all(), [
                    'email'     => 'required|exists:customers|max:255',
                    'password'  => 'required|min:6|max:255',
                ]);

            }else{
                if(setting('CAPTCHATYPE') == 'manual'){
                    if(setting('RECAPTCH_ENABLE_LOGIN')=='yes'){
                        $validator = Validator::make($request->all(), [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                            'captcha' => ['required', 'captcha'],
                        ]);

                    }else{
                        $validator = Validator::make($request->all(), [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                        ]);

                    }

                }
                if(setting('CAPTCHATYPE') == 'google'){
                    if(setting('RECAPTCH_ENABLE_LOGIN')=='yes'){
                        $validator = Validator::make($request->all(), [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                            'g-recaptcha-response'  =>  'required',

                        ]);

                    }else{
                        $validator = Validator::make($request->all(), [
                            'email'     => 'required|exists:customers|max:255',
                            'password'  => 'required|min:6|max:255',
                        ]);

                    }
                }
            }

            if ($validator->passes()) {
                $user = $request->email;
                $pass  = $request->password;
                $customerExist = Customer::where(['email' => $request->email, 'status' => 0])->exists();

            if ($customerExist) {
                return response()->json([ [5] ]);
            }
            $unverifiedCustomer = Customer::where('email', $request->email)->first();

            if (!empty($unverifiedCustomer) && $unverifiedCustomer->verified == 0) {
                return response()->json(['email' => $request->email, 'error' => [4] ]);
            }
            if (Auth::guard('customer')->attempt(array('email' => $user, 'password' => $pass)))
            {
                $cust = Customer::find(Auth::guard('customer')->id());
                $cust->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp(),
                    'last_logins_at' => Carbon::now()->toDateTimeString(),
                ]);
                session()->put('customerticket', Auth::guard('customer')->id());

                return response()->json([ [1] ]);

            }
            else
            {
                return response()->json([ [3] ]);
            }
            }
            else {
                return Response::json(['errors' => $validator->errors()]);
            }
            }
            else{
                return response()->json([ [30] ]);
            }

    }

    public function google2fa($email){


        $title = Apptitle::first();
        $data['title'] = $title;

        $socialAuthSettings = SocialAuthSetting::first();
        $data['socialAuthSettings'] = $socialAuthSettings;

        $now = now();
        $announcement = announcement::whereDate('enddate', '>=', $now->toDateString())->whereDate('startdate', '<=', $now->toDateString())->get();
        $data['announcement'] = $announcement;

        $announcements = Announcement::whereNotNull('announcementday')->get();
        $data['announcements'] = $announcements;

        $holidays = Holiday::whereDate('startdate', '<=', $now->toDateString())->whereDate('enddate', '>=', $now->toDateString())->get();
        $data['holidays'] =  $holidays;

        $seopage = Seosetting::first();
        $data['seopage'] = $seopage;

        if(session()->has('googleauthid')){
            return redirect()->route('client.dashboard');
        }
        if(!session()->has('google2faemail')){
            session()->put('google2faemail',$email);
        }

        $data['email'] =session()->get('google2faemail');

        return view('google2fa.indexlogin')->with($data);
    }

    public function google2fapage(Request $request)
    {
        $user = Customer::find($request->cust_id);
        if($request->twofactor == 1){
            $google2fa = app('pragmarx.google2fa');
            $google2fa_secret = $google2fa->generateSecretKey();
            $email = $user->email;
            $domainname = parse_url(url('/'));
            $request->session()->put('google2faemail',$email);
            $QR_Image = $google2fa->getQRCodeInline(
                $domainname['host'],
                config('app.name'),
                $google2fa_secret
            );

           return response()->json(['success' => lang('Please check your Email', 'alerts'),'QR_Image'=>$QR_Image,'secret'=>$google2fa_secret,'workprogress'=>'workingmode']);
        }else{

            $user->update(['google2fa_secret' => null,]);

            $custset = CustomerSetting::where('custs_id', $user->id)->first();
            $custset->twofactorauth = null;
            $custset->update();

            return response()->json(['success' => lang('successfully disabled your two factor authentication.', 'alerts'),'workprogress'=>
            'notworkingmode']);
        }
    }

    public function google2faotpverifylogin(Request $request){

        $otp = $request->one_time_password;

        if($request->id){
            $user = Customer::find($request->id);
        }

        if(session()->get('google2faemail')){
            $user = Customer::where('email','=',session()->get('google2faemail'))->first();
        }

        $google = decrypt($user->google2fa_secret);

        $google2fa = new Google2FA();
        $isValidOTP = $google2fa->verifyKey($google, $otp);

        if($isValidOTP){
            $request->session()->put('googleauthid',$user->email);
            return redirect()->route('client.dashboard');

        }else{
            return redirect()->back()->with('error', 'Invalid otp.');
        }
    }

    public function ajaxslogin(Request $request)
    {

        $user = $request->email;
        $pass  = $request->password;
        $pass  = $request->grecaptcha;

        $customerExist = Customer::where(['email' => $request->email, 'status' => 0])->exists();

        if ($customerExist) {
            return response()->json([ [5] ]);
        }
        $unverifiedCustomer = Customer::where('email', $request->email)->first();

        if (!empty($unverifiedCustomer) && $unverifiedCustomer->verified == 0) {
            return response()->json(['email' => $request->email, 'error' => [4] ]);
        }
        if (Auth::guard('customer')->attempt(array('email' => $user, 'password' => $pass)))
        {
            $cust = Customer::find(Auth::guard('customer')->id());
            $geolocation = GeoIP::getLocation(request()->getClientIp());
            $cust->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $geolocation->ip,
                'last_logins_at' => Carbon::now()->toDateTimeString(),
            ]);
            session()->put('customerticket', Auth::guard('customer')->id());
            return response()->json([ [1] ]);

        }
        else
         {
            return response()->json([ [3] ]);
         }
    }


    public function logout()
    {
        if(request()->session()->has('googleauthid')){
            request()->session()->forget('googleauthid');
        }
        if( request()->session()->has('google2faemail')){
            request()->session()->forget('google2faemail');
        }
        if(request()->session()->has('twofactoremail')){
            request()->session()->forget('twofactoremail');
        }
        if(request()->session()->has('customerticket')){
            request()->session()->forget('customerticket');
        }

        Auth::guard('customer')->logout();
        if(setting('REGISTER_POPUP') == 'yes'){

            return redirect()->route('home')->with('success',lang('Logout Successfull', 'alerts'));
        }else{
            return back()->with('success',lang('Logout Successfull', 'alerts'));
        }

    }

    // Social Login

    public function socialLogin($social)
    {
            $this->setSocailAuthConfigs();

            return Socialite::driver($social)->redirect();
    }
   /**
    * Obtain the user information from Social Logged in.
    * @param $social
    * @return Response
    */
    public function handleProviderCallback($social)
    {
        $this->setSocailAuthConfigs();
        $user = Socialite::driver($social)->user();
        $this->registerOrLogin($user);
        return redirect('customer/');
    }

    protected function registerOrLogin($data)
    {

        $user = Customer::where('email', '=', $data->email)->first();
        if(!$user){
            $user = new Customer();

            //
            if(array_key_exists('family_name', $data->user)){
                $user->firstname = $data->user['given_name'];
                $user->lastname = $data->user['family_name'];
                $user->username = $data->name;
            }

            if(array_key_exists('surname', $data->user)){
                $user->firstname = $data->user['firstname'];
                $user->lastname = $data->user['surname'];
                $user->username = $data->nickname;
                $user->logintype = 'envatosociallogin';
            }

            if(!array_key_exists('firstname', $data->user)){
                $user->username = $data->user['name'];
            }

            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->status = '1';
            $user->verified = '1';
            $user->userType = 'Customer';
            $user->save();

        }

        if($user->logintype == null){
            $user->logintype = 'sociallogin';
            $user->save();
        }
        Auth::guard('customer')->login($user);

    }

}
