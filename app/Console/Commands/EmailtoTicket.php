<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Ticket\Ticket;
use App\Models\Customer;
use App\Models\User;
use App\Models\EmailTicket;
use App\Models\CustomerSetting;

use Mail;
use App\Mail\mailmailablesend;
use App\Notifications\TicketCreateNotifications;
use App\Models\tickethistory;
use \Webklex\IMAP\Facades\Client;
use Illuminate\Support\Facades\Auth;
use \Webklex\IMAP\Support\AttachmentCollection;
use File;
use Illuminate\Support\Str;

use App\Models\Ticket\Comment;
use App\Models\CCMAILS;
use App\Models\EmailTemplate;
use App\Models\Holiday;
use Carbon\Carbon;
use Swift_Mime_SimpleMessage;
use Swift_Mime_Headers_MessageIdHeader;

class EmailtoTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imap:emailticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(setting('IMAP_STATUS') == 'on'){
            $client = Client::make([
                'host'          => setting('IMAP_HOST'),
                'port'          => setting('IMAP_PORT'),
                'encryption'    => setting('IMAP_ENCRYPTION'),
                'validate_cert' => true,
                'username'      => setting('IMAP_USERNAME'),
                'password'      => setting('IMAP_PASSWORD'),
                'protocol'      => setting('IMAP_PROTOCOL')
            ]);
            $client->connect();
            $aFolder = $client->getFolders();
            foreach($aFolder as $folder){
                foreach($folder->messages()->unseen()->get() as $message){
                    $userexits = Customer::where('email', $message->getFrom()[0]->mail)->count();

                    if($userexits == 1){
                        $guest = Customer::where('email', $message->getFrom()[0]->mail)->first();

                    }else{
                        $guest = Customer::create([

                            'firstname' => '',
                            'lastname' => '',
                            'username' => $message->getFrom()[0]->personal,
                            'email' => $message->getFrom()[0]->mail,
                            'userType' => 'Guest',
                            'password' => null,
                            'country' => '',
                            'timezone' => 'UTC',
                            'status' => '1',
                            'image' => null,

                        ]);
                        $customersetting = new CustomerSetting();
                        $customersetting->custs_id = $guest->id;
                        $customersetting->save();
                    }

                    if($guest->status == 1){
                        $body = $message->getHTMLBody(true);

                        $stripped_body = strip_tags($message->getTextBody());

                        $today = Carbon::today();
                        $holidays = Holiday::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('status','1')->get();

                        $originalMessageId = null;
                        $rawHeaders = $message->header->raw;

                        if (preg_match('/Message-ID:\s*<(.*?)>/i', $rawHeaders, $matches)) {
                            $originalMessageId = $matches[1];
                        }

                        if (preg_match('/Message-ID:\s?<(.+?)>/i', $rawHeaders, $matches)) {
                            $originalMessageId = $matches[1];
                        }

                        if(Str::contains($message->getSubject(), "Delivery Status Notification (Failure)") === true){
                            $message->setFlag('SEEN');
                        }

                        if(Str::contains($message->getSubject(), "Undeliverable: Invalid") === true){
                            $message->setFlag('SEEN');
                        }

                        if(strpos(strtolower($message->getSubject()), 're:') === 0){
                            if(Str::contains($message->getSubject(), "Re: ") === true){
                                $explodedsub = explode("Re: ",$message->getSubject());
                            }else{
                                $explodedsub = explode("RE: ",$message->getSubject());
                            }

                            $checktic = Ticket::where('cust_id', $guest->id)->where('subject',$explodedsub[1])->first();

                            if($checktic != null){
                                $commentexists = $checktic->comments()->first();
                                if($commentexists != null){
                                    $dateday = $commentexists->created_at->format("D");
                                    $datefullday = $commentexists->created_at->format('l, F j, Y');
                                    $dateyahoo = $commentexists->created_at->format('l, j F, Y');
                                }else{
                                    $dateday = $checktic->created_at->format("D");
                                    $datefullday = $checktic->created_at->format('l, F j, Y');
                                    $dateyahoo = $checktic->created_at->format('l, j F, Y');
                                }

                                $abcdefg = setting('IMAP_USERNAME');
                                $url = url('/');

                                if($checktic->status == 'Closed'){
                                    $ticketData = [
                                        'ticket_id' => $checktic->ticket_id,
                                        'ticket_username' => $checktic->cust->username,
                                        'ticket_title' => $checktic->subject,
                                        'ticket_description' => $checktic->message,
                                        'ticket_customer_url' => route('guest.ticketdetailshow', $checktic->ticket_id),
                                        'ticket_admin_url' => url('/admin/ticket-view/'.$checktic->ticket_id),
                                        'url' => url('/'),
                                    ];

                                    try{
                                        $replySubject = 'Re: ' . $message->getSubject();
                                        $emailtemplate = EmailTemplate::where('code', 'send_a_reply_to_the_customer_when_a_customer_responds_to_a_closed_email_ticket')->first();
                                        $body = $emailtemplate->body;

                                        foreach ($ticketData as $key => $value) {
                                            $body = str_replace('{{'.$key.'}}', $value, $body);
                                            $body = str_replace('{{ '.$key.' }}', $value, $body);
                                        }

                                        Mail::send([], [], function ($message) use ($checktic, $replySubject, $body) {
                                            $message->to($checktic->cust->email)
                                                ->from(setting('IMAP_USERNAME'))
                                                ->subject($replySubject)
                                                ->setBody($body, 'text/html');
                                            $headers = $message->getHeaders();
                                            $headers->removeAll('In-Reply-To');
                                            $headers->removeAll('References');
                                            $headers->addTextHeader('In-Reply-To', '<' . $checktic->MessageID . '>');
                                            $headers->addTextHeader('References', '<' . $checktic->MessageID . '>');

                                        });
                                    }catch(\Exception $e){

                                    }

                                    $message->setFlag('SEEN');
                                }elseif($checktic->status == 'Suspend'){
                                    $ticketData = [
                                        'ticket_id' => $checktic->ticket_id,
                                        'ticket_username' => $checktic->cust->username,
                                        'ticket_title' => $checktic->subject,
                                        'ticket_description' => $checktic->message,
                                        'ticket_customer_url' => route('guest.ticketdetailshow', $checktic->ticket_id),
                                        'ticket_admin_url' => url('/admin/ticket-view/'.$checktic->ticket_id),
                                    ];

                                    try{
                                        $replySubject = 'Re: ' . $message->getSubject();
                                        $emailtemplate = EmailTemplate::where('code', 'send_a_reply_to_the_customer_when_a_customer_responds_to_a_suspended_email_ticket')->first();
                                        $body = $emailtemplate->body;

                                        foreach ($ticketData as $key => $value) {
                                            $body = str_replace('{{'.$key.'}}', $value, $body);
                                            $body = str_replace('{{ '.$key.' }}', $value, $body);
                                        }

                                        Mail::send([], [], function ($message) use ($checktic, $replySubject, $body) {
                                            $message->to($checktic->cust->email)
                                                ->from(setting('IMAP_USERNAME'))
                                                ->subject($replySubject)
                                                ->setBody($body, 'text/html');
                                            $headers = $message->getHeaders();
                                            $headers->removeAll('In-Reply-To');
                                            $headers->removeAll('References');
                                            $headers->addTextHeader('In-Reply-To', '<' . $checktic->MessageID . '>');
                                            $headers->addTextHeader('References', '<' . $checktic->MessageID . '>');

                                        });
                                    }catch(\Exception $e){

                                    }

                                    $message->setFlag('SEEN');
                                }else{
                                    $finalcomment = '';
                                    // from outlook
                                    if(Str::contains($stripped_body, "-----Original Message-----") === true){
                                        $alltimefromone = explode("-----Original Message-----",$stripped_body);
                                        $finalcomment = $alltimefromone[0];
                                    }elseif(Str::contains($stripped_body, "\r\n________________________________\r\n") === true){
                                        $alltimefromtwo = explode("\r\n________________________________\r\n",$stripped_body);
                                        $finalcomment = $alltimefromtwo[0];
                                    }elseif(Str::contains($stripped_body, "From: $abcdefg [mailto:$abcdefg]") === true){
                                        $alltimefromthree = explode("From: $abcdefg [mailto:$abcdefg]",$stripped_body);
                                        $finalcomment = $alltimefromthree[0];
                                    }elseif(Str::contains($stripped_body, "Sent using \r\n") === true){
                                        // from zoho
                                        $alltimezoho = explode("Sent using \r\n",$stripped_body);
                                        $finalcomment = $alltimezoho[0];
                                    }elseif(Str::contains($stripped_body, "---- On $dateday, ") === true){
                                        // from zoho
                                        $alltimezohot = explode("---- On $dateday, ",$stripped_body);
                                        $finalcomment = $alltimezohot[0];
                                    }elseif(Str::contains($stripped_body, "On $dateday, ") === true){
                                        // from gmail
                                        $alltimeOn = explode("\r\n\r\nOn $dateday, ", $stripped_body);
                                        $finalcomment = $alltimeOn[0];
                                    }elseif(Str::contains($stripped_body, "On $datefullday at") === true){
                                        // from aol
                                        $alltimeaol = explode("On $datefullday at", $stripped_body);
                                        $finalcomment = $alltimeaol[0];
                                    }elseif(Str::contains($stripped_body, "On $dateyahoo at") === true){
                                        // from yahoo
                                        $alltimeyahoo = explode("On $dateyahoo at", $stripped_body);
                                        $finalcomment = $alltimeyahoo[0];
                                    }elseif(Str::contains($stripped_body, ", {$abcdefg} wrote:\r\n") === true){
                                        $alltimewebmail = explode("> ",$stripped_body);
                                        $explodeagain = explode("\r\n",end($alltimewebmail));
                                        $finalcomment = end($explodeagain);
                                    }elseif(Str::contains($stripped_body, "[1] $url\r\n") === true){
                                        $alltimeoutlook = explode("[1] $url\r\n", $stripped_body);
                                        $finalcomment = $alltimeoutlook[1];
                                    }else{
                                        $finalcomment = $stripped_body;
                                    }

                                    if($checktic->comments()->get() != null){
                                        $comm = $checktic->comments()->update([
                                            'display' => null
                                        ]);
                                    }

                                    $comment = new Comment();
                                    $comment->ticket_id = $checktic->id;
                                    $comment->cust_id = $guest->id;
                                    $comment->user_id = null;
                                    $comment->display = 1;
                                    $comment->comment = $finalcomment;

                                    $finalfile = [];
                                    $attachedfiles = $message->getAttachments();
                                    foreach($attachedfiles as $attachedfile){
                                        array_push($finalfile, $attachedfile->name);
                                    }
                                    $newArr = implode(",", $finalfile);
                                    $comment->emailcommentfile =  $newArr != "" ? $newArr : null;

                                    $message->getAttachments()->each(function ($oAttachment) use ($message) {
                                        file_put_contents(public_path('uploads/emailtoticketcomment' . '/' . $oAttachment->name), $oAttachment->content);
                                    });

                                    $comment->save();


                                    $commentupdate = Comment::find($comment->id);
                                    if($commentupdate->emailcommentfile != null){
                                        $arraytype = explode(',', $commentupdate->emailcommentfile);
                                        foreach($arraytype as $arraytypes){
                                            $file_path = public_path('uploads/emailtoticketcomment/'. $arraytypes);
                                            $file_size = File::size($file_path) / 1024 / 1024;

                                            $attachexten = explode(".", $arraytypes);
                                            $appliexten = explode(",", setting('FILE_UPLOAD_TYPES'));
                                            $appliextenfinal = Str::remove('.', $appliexten);
                                            if(!in_array($attachexten[1], $appliextenfinal) || $file_size > setting('FILE_UPLOAD_MAX') || count($arraytype) > setting('MAX_FILE_UPLOAD')){
                                                $commentupdate->emailcommentfile = 'mismatch';
                                                $commentupdate->update();
                                                File::delete($file_path);
                                            }
                                        }
                                    }

                                    $ticket = Ticket::find($checktic->id);
                                    $ticket->last_reply = now();

                                    if(setting('AUTO_OVERDUE_TICKET') == 'no'){
                                        $ticket->auto_overdue_ticket = null;
                                        $ticket->overduestatus = null;
                                    }else{
                                        if(setting('AUTO_OVERDUE_TICKET_TIME') == '0'){
                                            $ticket->auto_overdue_ticket = null;
                                            $ticket->overduestatus = null;
                                        }else{
                                            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()){
                                                if($ticket->status == 'Closed'){
                                                    $ticket->auto_overdue_ticket = null;
                                                    $ticket->overduestatus = null;
                                                }
                                                else{
                                                    $ticket->auto_overdue_ticket = now()->addDays(setting('AUTO_OVERDUE_TICKET_TIME'));
                                                    $ticket->overduestatus = null;
                                                }
                                            }
                                        }
                                    }

                                    if(setting('AUTO_CLOSE_TICKET') == 'no'){
                                        $ticket->auto_close_ticket = null;
                                    }else{
                                        if(setting('AUTO_CLOSE_TICKET_TIME') == '0'){
                                            $ticket->auto_close_ticket = null;
                                        }else{

                                            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()){
                                                $ticket->auto_close_ticket = null;
                                            }
                                        }
                                    }

                                    if(setting('AUTO_RESPONSETIME_TICKET') == 'no'){
                                        $ticket->auto_replystatus = null;
                                    }else{
                                        if(setting('AUTO_RESPONSETIME_TICKET_TIME') == '0'){
                                            $ticket->auto_replystatus = null;
                                        }else{
                                            if(Auth::guard('customer')->check() && Auth::guard('customer')->user()){
                                                $ticket->auto_replystatus = null;
                                            }
                                        }
                                    }

                                    $ticket->replystatus = 'Replied';
                                    $ticket->update();



                                    $tickethistory = new tickethistory();
                                    $tickethistory->ticket_id = $ticket->id;

                                    $output = '<div class="d-flex align-items-center">
                                        <div class="mt-0">
                                            <p class="mb-0 fs-12 mb-1">Status
                                        ';
                                    if($ticket->ticketnote->isEmpty()){
                                        if($ticket->overduestatus != null){
                                            $output .= '
                                            <span class="text-info font-weight-semibold mx-1">'.$ticket->status.'</span>
                                            <span class="text-danger font-weight-semibold mx-1">'.$ticket->overduestatus.'</span>
                                            ';
                                        }else{
                                            $output .= '
                                            <span class="text-info font-weight-semibold mx-1">'.$ticket->status.'</span>
                                            ';
                                        }

                                    }else{
                                        if($ticket->overduestatus != null){
                                            $output .= '
                                            <span class="text-info font-weight-semibold mx-1">'.$ticket->status.'</span>
                                            <span class="text-danger font-weight-semibold mx-1">'.$ticket->overduestatus.'</span>
                                            <span class="text-warning font-weight-semibold mx-1">Note</span>
                                            ';
                                        }else{
                                            $output .= '
                                            <span class="text-info font-weight-semibold mx-1">'.$ticket->status.'</span>
                                            <span class="text-warning font-weight-semibold mx-1">Note</span>
                                            ';
                                        }
                                    }

                                    $output .= '
                                        <p class="mb-0 fs-17 font-weight-semibold text-dark">'.$comment->cust->username.'<span class="fs-11 mx-1 text-muted">(Responded)</span></p>
                                    </div>
                                    <div class="ms-auto">
                                    <span class="float-end badge badge-danger-light">
                                        <span class="fs-11 font-weight-semibold">'.$comment->cust->userType.'</span>
                                    </span>
                                    </div>

                                    </div>
                                    ';
                                    $tickethistory->ticketactions = $output;
                                    $tickethistory->save();

                                    $ccemailsend = CCMAILS::where('ticket_id', $ticket->id)->first();

                                    $ticketData = [
                                        'ticket_username' => $ticket->cust->username,
                                        'ticket_title' => $ticket->subject,
                                        'ticket_id' => $ticket->ticket_id,
                                        'ticket_status' => $ticket->status,
                                        'comment' => $comment->comment,
                                        'ticket_admin_url' => url('/admin/ticket-view/'.$ticket->ticket_id),
                                    ];

                                    try{

                                        $commentData = [
                                            'ticket_id' => $ticket->ticket_id,
                                            'ticket_username' => $ticket->cust->username,
                                            'ticket_title' => $ticket->subject,
                                            'ticket_file_format' => setting('FILE_UPLOAD_TYPES'),
                                            'ticket_file_size' => setting('FILE_UPLOAD_MAX'),
                                            'ticket_file_count' => setting('MAX_FILE_UPLOAD'),
                                            'ticket_description' => $ticket->message,
                                            'ticket_customer_url' => route('guest.ticketdetailshow', $ticket->ticket_id),
                                            'ticket_admin_url' => url('/admin/ticket-view/'.$ticket->ticket_id),
                                        ];

                                        $replySubject = 'Re: ' . $ticket->subject;
                                        if($commentupdate->emailcommentfile == 'mismatch'){
                                            $emailtemplate = EmailTemplate::where('code', 'customer_send_guestticket_created_with_attachment_failed')->first();
                                            $body = $emailtemplate->body;

                                            foreach ($commentData as $key => $value) {
                                                $body = str_replace('{{'.$key.'}}', $value, $body);
                                                $body = str_replace('{{ '.$key.' }}', $value, $body);
                                            }

                                            Mail::send([], [], function ($message) use ($ticket, $replySubject, $body) {
                                                $message->to($ticket->cust->email)
                                                    ->from(setting('IMAP_USERNAME'))
                                                    ->subject($replySubject)
                                                    ->setBody($body, 'text/html');
                                                $headers = $message->getHeaders();
                                                $headers->removeAll('In-Reply-To');
                                                $headers->removeAll('References');
                                                $headers->addTextHeader('In-Reply-To', '<' . $ticket->MessageID . '>');
                                                $headers->addTextHeader('References', '<' . $ticket->MessageID . '>');

                                            });
                                        }

                                        if ($holidays->isNotEmpty()) {
                                            $emailtemplate = EmailTemplate::where('code', 'customer_send_ticket_created_that_holiday_or_announcement')->first();

                                            $body = $emailtemplate->body;

                                            foreach ($commentData as $key => $value) {
                                                $body = str_replace('{{'.$key.'}}', $value, $body);
                                                $body = str_replace('{{ '.$key.' }}', $value, $body);
                                            }

                                            Mail::send([], [], function ($message) use ($ticket, $replySubject, $body) {
                                                $message->to($ticket->cust->email)
                                                    ->from(setting('IMAP_USERNAME'))
                                                    ->subject($replySubject)
                                                    ->setBody($body, 'text/html');
                                                $headers = $message->getHeaders();
                                                $headers->removeAll('In-Reply-To');
                                                $headers->removeAll('References');
                                                $headers->addTextHeader('In-Reply-To', '<' . $ticket->MessageID . '>');
                                                $headers->addTextHeader('References', '<' . $ticket->MessageID . '>');

                                            });
                                        }

                                        if($ticket->category){
                                            $notificationcatss = $ticket->category->groupscategoryc()->get();
                                            $icc = array();
                                            if($notificationcatss->isNotEmpty()){

                                                foreach($notificationcatss as $igc){

                                                    foreach($igc->groupsc->groupsuser()->get() as $user){
                                                        $icc[] .= $user->users_id;
                                                    }
                                                }

                                                if(!$icc){
                                                    $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                    foreach($admins as $admin){
                                                        if($admin->getRoleNames()[0] == 'superadmin'){
                                                            $admin->notify(new TicketCreateNotifications($ticket));
                                                            if($admin->usetting->emailnotifyon == 1){
                                                                Mail::to($admin->email)
                                                                ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                            }
                                                        }
                                                    }

                                                }else{
                                                    if($ticket->myassignuser_id){
                                                        $assignee = $ticket->ticketassignmutliples;
                                                        foreach($assignee as $assignees){
                                                            $user = User::where('id',$assignees->toassignuser_id)->get();
                                                            foreach($user as $users){
                                                                if($users->id == $assignees->toassignuser_id){
                                                                    $users->notify(new TicketCreateNotifications($ticket));
                                                                    if($users->usetting->emailnotifyon == 1){
                                                                        Mail::to($users->email)
                                                                        ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                        foreach($admins as $admin){
                                                            if($admin->getRoleNames()[0] == 'superadmin'){
                                                                $admin->notify(new TicketCreateNotifications($ticket));
                                                                if($admin->usetting->emailnotifyon == 1){
                                                                    Mail::to($admin->email)
                                                                    ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                                }
                                                            }
                                                        }
                                                    } else if ($ticket->selfassignuser_id) {

                                                        $self = User::findOrFail($ticket->selfassignuser_id);
                                                        $self->notify(new TicketCreateNotifications($ticket));
                                                        if($self->usetting->emailnotifyon == 1){
                                                            Mail::to($self->email)
                                                            ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                        }
                                                        $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                        foreach($admins as $admin){
                                                            if($admin->getRoleNames()[0] == 'superadmin'){
                                                                $admin->notify(new TicketCreateNotifications($ticket));
                                                                if($admin->usetting->emailnotifyon == 1){
                                                                    Mail::to($admin->email)
                                                                    ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                                }
                                                            }
                                                        }
                                                    } else if($icc){
                                                        $user = User::whereIn('id', $icc)->get();
                                                        foreach($user as $users){
                                                            $users->notify(new TicketCreateNotifications($ticket));
                                                            if($users->usetting->emailnotifyon == 1){
                                                                Mail::to($users->email)
                                                                ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                            }
                                                        }
                                                        $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                        foreach($admins as $admin){
                                                            if($admin->getRoleNames()[0] == 'superadmin'){
                                                                $admin->notify(new TicketCreateNotifications($ticket));
                                                                if($admin->usetting->emailnotifyon == 1){
                                                                    Mail::to($admin->email)
                                                                    ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                                }
                                                            }
                                                        }
                                                    }else {
                                                        $users = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                        foreach($users as $user){
                                                            $user->notify(new TicketCreateNotifications($ticket));
                                                            if($user->usetting->emailnotifyon == 1){
                                                                Mail::to($user->email)
                                                                ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                            }
                                                        }
                                                    }


                                                }
                                            }else{
                                                if($ticket->myassignuser){
                                                    $assignee = $ticket->ticketassignmutliples;
                                                    foreach($assignee as $assignees){
                                                        $user = User::where('id',$assignees->toassignuser_id)->get();
                                                        foreach($user as $users){
                                                            if($users->id == $assignees->toassignuser_id){
                                                                $users->notify(new TicketCreateNotifications($ticket));
                                                                if($users->usetting->emailnotifyon == 1){
                                                                    Mail::to($users->email)
                                                                    ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                    foreach($admins as $admin){
                                                        if($admin->getRoleNames()[0] == 'superadmin'){
                                                            $admin->notify(new TicketCreateNotifications($ticket));
                                                            if($admin->usetting->emailnotifyon == 1){
                                                                Mail::to($admin->email)
                                                                ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                            }
                                                        }
                                                    }
                                                } else if ($ticket->selfassignuser_id) {
                                                    $self = User::findOrFail($ticket->selfassignuser_id);
                                                    $self->notify(new TicketCreateNotifications($ticket));
                                                    if($self->usetting->emailnotifyon == 1){
                                                        Mail::to($self->email)
                                                        ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                    }
                                                    $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                    foreach($admins as $admin){
                                                        if($admin->getRoleNames()[0] == 'superadmin'){
                                                            $admin->notify(new TicketCreateNotifications($ticket));
                                                            if($admin->usetting->emailnotifyon == 1){
                                                                Mail::to($admin->email)
                                                                ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                            }
                                                        }
                                                    }
                                                } else {

                                                    $users = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                                    foreach($users as $user){
                                                        $user->notify(new TicketCreateNotifications($ticket));
                                                        if($user->usetting->emailnotifyon == 1){
                                                            Mail::to($user->email)
                                                            ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                            foreach($admins as $admin){
                                                $admin->notify(new TicketCreateNotifications($ticket));
                                                if($admin->usetting->emailnotifyon == 1){
                                                    Mail::to($admin->email)
                                                    ->send( new mailmailablesend( 'admin_send_email_ticket_reply', $ticketData ) );
                                                }
                                            }
                                        }

                                    }catch(\Exception $e){

                                    }

                                    $message->setFlag('SEEN');
                                }
                            }else{
                                try{
                                    $replySubject = 'Re: ' . $explodedsub[1];
                                    $emailtemplate = EmailTemplate::where('code', 'send_mail_customer_when_a_customer_responds_to_a_restricted_mails')->first();
                                    $body = $emailtemplate->body;

                                    Mail::send([], [], function ($message) use ($originalMessageId, $guest, $replySubject, $body) {
                                        $message->to($guest->email)
                                            ->subject($replySubject)
                                            ->setBody($body, 'text/html');
                                        $headers = $message->getHeaders();
                                        $headers->removeAll('In-Reply-To');
                                        $headers->removeAll('References');
                                        $headers->addTextHeader('In-Reply-To', '<' . $originalMessageId . '>');
                                        $headers->addTextHeader('References', '<' . $originalMessageId . '>');

                                    });
                                }catch(\Exception $e){

                                }

                                $message->setFlag('SEEN');
                            }
                        }else{

                            $tickmessage = '';
                            if(Str::contains($stripped_body, "Sent using\n") === true){
                                $alltimefromone = explode("Sent using\n",$stripped_body);
                                $tickmessage = $alltimefromone[0];
                            }else{
                                $tickmessage = $stripped_body;
                            }

                            if(Str::contains($message->getSubject(), "Sent using\n") === true){
                                $alltimesub = explode("Sent using\n",$message->getSubject());
                                $ticksub = $alltimesub[0];
                            }else{
                                $ticksub = $message->getSubject();
                            }

                            $ticket = Ticket::create([
                                'subject' => $ticksub,
                                'cust_id' => $guest->id,
                                'category_id' => null,
                                'priority' => null,
                                'message' => $tickmessage,
                                'tickettype' => 'emalitoticket',
                                'MessageID' => $originalMessageId,
                                'status' => 'New',
                            ]);
                            $ticket = Ticket::find($ticket->id);
                            if($guest->userType == 'Guest'){
                                $ticket->ticket_id = setting('CUSTOMER_TICKETID').'G-'.$ticket->id;
                            }else{
                                $ticket->ticket_id = setting('CUSTOMER_TICKETID').'-'.$ticket->id;
                            }

                            if (setting('AUTO_OVERDUE_TICKET') == 'no') {
                                $ticket->auto_overdue_ticket = null;
                            } else {
                                if (setting('AUTO_OVERDUE_TICKET_TIME') == '0') {
                                    $ticket->auto_overdue_ticket = null;
                                } else {
                                    if (Auth::guard('customer')->check() && Auth::guard('customer')->user()) {
                                        if ($ticket->status == 'Closed') {
                                            $ticket->auto_overdue_ticket = null;
                                        } else {
                                            $ticket->auto_overdue_ticket = now()->addDays(setting('AUTO_OVERDUE_TICKET_TIME'));
                                        }
                                    }
                                }
                            }

                            $finalfile = [];
                            $attachedfiles = $message->getAttachments();
                            foreach($attachedfiles as $attachedfile){
                                array_push($finalfile, $attachedfile->name);
                            }
                            $newArr = implode(",", $finalfile);
                            $ticket->emailticketfile =   $newArr != "" ? $newArr : null;

                            $message->getAttachments()->each(function ($oAttachment) use ($message) {
                                file_put_contents(public_path('uploads/emailtoticket' . '/' . $oAttachment->name), $oAttachment->content);
                            });

                            $ticket->update();


                            $ticket = Ticket::find($ticket->id);
                            if($ticket->emailticketfile != null){
                                $arraytype = explode(',', $ticket->emailticketfile);
                                foreach($arraytype as $arraytypes){
                                    $file_path = public_path('uploads/emailtoticket/'. $arraytypes);
                                    $file_size = File::size($file_path) / 1024 / 1024;

                                    $attachexten = explode(".", $arraytypes);
                                    $appliexten = explode(",", setting('FILE_UPLOAD_TYPES'));
                                    $appliextenfinal = Str::remove('.', $appliexten);
                                    if(!in_array($attachexten[1], $appliextenfinal) || $file_size > setting('FILE_UPLOAD_MAX') || count($arraytype) > setting('MAX_FILE_UPLOAD')){
                                        $ticket->emailticketfile = 'mismatch';
                                        $ticket->update();
                                        File::delete($file_path);

                                    }
                                }
                            }


                            $tickethistory = new tickethistory();
                            $tickethistory->ticket_id = $ticket->id;

                            $output = '<div class="d-flex align-items-center">
                                <div class="mt-0">
                                    <p class="mb-0 fs-12 mb-1">Status
                                ';
                            if($ticket->ticketnote->isEmpty()){
                                if($ticket->overduestatus != null){
                                    $output .= '
                                    <span class="text-burnt-orange font-weight-semibold mx-1">'.$ticket->status.'</span>
                                    <span class="text-danger font-weight-semibold mx-1">'.$ticket->overduestatus.'</span>
                                    ';
                                }else{
                                    $output .= '
                                    <span class="text-burnt-orange font-weight-semibold mx-1">'.$ticket->status.'</span>
                                    ';
                                }

                            }else{
                                if($ticket->overduestatus != null){
                                    $output .= '
                                    <span class="text-burnt-orange font-weight-semibold mx-1">'.$ticket->status.'</span>
                                    <span class="text-danger font-weight-semibold mx-1">'.$ticket->overduestatus.'</span>
                                    <span class="text-warning font-weight-semibold mx-1">Note</span>
                                    ';
                                }else{
                                    $output .= '
                                    <span class="text-burnt-orange font-weight-semibold mx-1">'.$ticket->status.'</span>
                                    <span class="text-warning font-weight-semibold mx-1">Note</span>
                                    ';
                                }
                            }

                            $output .= '
                                <p class="mb-0 fs-17 font-weight-semibold text-dark">Guest User<span class="fs-11 mx-1 text-muted">(Email Ticket)</span></p>
                            </div>
                            <div class="ms-auto">
                            <span class="float-end badge badge-danger-light">
                                <span class="fs-11 font-weight-semibold">' .$guest->userType . ' </span>
                            </span>
                            </div>

                            </div>
                            ';
                            $tickethistory->ticketactions = $output;
                            $tickethistory->save();

                            $ticketData = [
                                'ticket_id' => $ticket->ticket_id,
                                'ticket_username' => $ticket->cust->username,
                                'ticket_title' => $ticket->subject,
                                'ticket_file_format' => setting('FILE_UPLOAD_TYPES'),
                                'ticket_file_size' => setting('FILE_UPLOAD_MAX'),
                                'ticket_file_count' => setting('MAX_FILE_UPLOAD'),
                                'ticket_description' => $ticket->message,
                                'ticket_customer_url' => route('guest.ticketdetailshow', $ticket->ticket_id),
                                'ticket_admin_url' => url('/admin/ticket-view/'.$ticket->ticket_id),
                            ];

                            try{
                                if($ticket->emailticketfile == 'mismatch'){

                                    $replySubject = 'Re: ' . $message->getSubject();
                                    $emailtemplate = EmailTemplate::where('code', 'customer_send_guestticket_created_with_attachment_failed')->first();
                                    $body = $emailtemplate->body;

                                    foreach ($ticketData as $key => $value) {
                                        $body = str_replace('{{'.$key.'}}', $value, $body);
                                        $body = str_replace('{{ '.$key.' }}', $value, $body);
                                    }

                                    Mail::send([], [], function ($message) use ($ticket, $replySubject, $body) {
                                        $message->to($ticket->cust->email)
                                            ->from(setting('IMAP_USERNAME'))
                                            ->subject($replySubject)
                                            ->setBody($body, 'text/html');
                                        $headers = $message->getHeaders();
                                        $headers->removeAll('In-Reply-To');
                                        $headers->removeAll('References');
                                        $headers->addTextHeader('In-Reply-To', '<' . $ticket->MessageID . '>');
                                        $headers->addTextHeader('References', '<' . $ticket->MessageID . '>');

                                    });
                                }else{
                                    $replySubject = 'Re: ' . $message->getSubject();
                                    $emailtemplate = EmailTemplate::where('code', 'customer_send_ticket_created')->first();
                                    $body = $emailtemplate->body;

                                    foreach ($ticketData as $key => $value) {
                                        $body = str_replace('{{'.$key.'}}', $value, $body);
                                        $body = str_replace('{{ '.$key.' }}', $value, $body);
                                    }

                                    Mail::send([], [], function ($message) use ($ticket, $replySubject, $body) {
                                        $message->to($ticket->cust->email)
                                            ->from(setting('IMAP_USERNAME'))
                                            ->subject($replySubject)
                                            ->setBody($body, 'text/html');
                                        $headers = $message->getHeaders();
                                        $headers->removeAll('In-Reply-To');
                                        $headers->removeAll('References');
                                        $headers->addTextHeader('In-Reply-To', '<' . $ticket->MessageID . '>');
                                        $headers->addTextHeader('References', '<' . $ticket->MessageID . '>');

                                    });
                                }

                                if ($holidays->isNotEmpty()) {
                                    $replySubject = 'Re: ' . $message->getSubject();
                                    $emailtemplate = EmailTemplate::where('code', 'customer_send_ticket_created_that_holiday_or_announcement')->first();

                                    $body = $emailtemplate->body;

                                    foreach ($ticketData as $key => $value) {
                                        $body = str_replace('{{'.$key.'}}', $value, $body);
                                        $body = str_replace('{{ '.$key.' }}', $value, $body);
                                    }

                                    Mail::send([], [], function ($message) use ($ticket, $replySubject, $body) {
                                        $message->to($ticket->cust->email)
                                            ->from(setting('IMAP_USERNAME'))
                                            ->subject($replySubject)
                                            ->setBody($body, 'text/html');
                                        $headers = $message->getHeaders();
                                        $headers->removeAll('In-Reply-To');
                                        $headers->removeAll('References');
                                        $headers->addTextHeader('In-Reply-To', '<' . $ticket->MessageID . '>');
                                        $headers->addTextHeader('References', '<' . $ticket->MessageID . '>');

                                    });
                                }

                                $admins = User::leftJoin('groups_users','groups_users.users_id','users.id')->whereNull('groups_users.groups_id')->whereNull('groups_users.users_id')->get();
                                foreach($admins as $admin){
                                    $admin->notify(new TicketCreateNotifications($ticket));
                                    if($admin->usetting->emailnotifyon == 1){
                                        Mail::to($admin->email)
                                        ->send( new mailmailablesend( 'admin_send_email_ticket_created', $ticketData ) );
                                    }
                                }

                            }catch(\Exception $e){

                            }
                            $message->setFlag('SEEN');
                        }
                    }else{
                        $message->setFlag('SEEN');
                    }

                }
            }
        }
    }
}
