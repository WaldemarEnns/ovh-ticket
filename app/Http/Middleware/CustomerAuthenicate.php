<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\CustomerSetting;

class CustomerAuthenicate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(setting('Customer_email_two_fact') == 'on' && CustomerSetting::where(['custs_id' => Auth::guard('customer')->user()->id, 'twofactorauth' => 'emailtwofact'])->exists()){

            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->status == '1' && session()->get('twofactoremail') == Auth::guard('customer')->user()->email ){
                return $next($request);
            }else{
                if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->status == '1'){
                    return redirect()->route('verify.twofactor',['email' =>Auth::guard('customer')->user()->email]);
                }else{
                    Auth::guard('customer')->logout();
                    return redirect()->route('auth.login');
                }
            }
        }elseif(setting('Customer_google_two_fact') == 'on' && CustomerSetting::where(['custs_id' => Auth::guard('customer')->user()->id, 'twofactorauth' => 'googletwofact'])->exists()){

            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->status == '1' && session()->get('googleauthid') == Auth::guard('customer')->user()->email ){
                return $next($request);
            }else{
                if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->status == '1'){
                    return redirect()->route('google2fa.login',['email' =>Auth::guard('customer')->user()->email]);
                }else{
                    Auth::guard('customer')->logout();
                    return redirect()->route('auth.login');
                }
            }
       }else{
            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->status == '1' ){
                return $next($request);
            }else{
                Auth::guard('customer')->logout();
                return redirect()->route('auth.login');
            }
       }
    }
}
