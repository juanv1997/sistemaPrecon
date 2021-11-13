<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){

        $details = [ 'title' => 'Welcome to Laravel', 
                     'body' => 'This is a test email'
                  ];

        Mail::to("juanpvalenciar@hotmail.com")->send(new TestMail($details));

        return "Email sent";

    }
    
}
