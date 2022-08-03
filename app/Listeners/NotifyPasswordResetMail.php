<?php

namespace App\Listeners;

use App\Events\ResetMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class NotifyPasswordResetMail
{
    public function handle(ResetMail $event)
    {
          $mail=Mail::to($event->email)->send(new PasswordResetMail($event->user,$event->token));
          
    }
}
