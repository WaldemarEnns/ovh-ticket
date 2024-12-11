<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class Testemail extends Controller
{
    //
// public function sendTestEmail()
// {
//     Mail::raw('This is a test email sent via Elastic Email and Laravel!', function ($message) {
//         $message->to('recipient@example.com')->subject('Test Email');
//     });
//     // return 'Test email sent successfully!';
//     return view('testemail', ['message' => 'Test email sent successfully!']);
// }


public function sendEmail()
{
    Mail::send('emails.my-email', [], function ($message) {
        $message->to('your_email_address');
        $message->subject('Test Email');
    });

    return redirect()->back()->with('success', 'Email sent successfully!');
}

}
