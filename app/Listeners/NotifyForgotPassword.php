<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class NotifyForgotPassword
{
    public function handle(ForgotPassword $event)
    {
        $mail=Mail::to($event->email)->send(new ForgotPasswordMail($event->user,$event->token));
    
    }
}
