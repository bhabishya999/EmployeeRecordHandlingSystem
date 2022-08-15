<?php

namespace App\Mail;
use Illuminate\Mail\Mailable;
use App\Models\User;

class ForgotPasswordMail extends Mailable
{
    public function __construct(public User|Model $user,public string $token)
    {
        //
    }

    public function build()
    {
        return $this->view('forgot_password_email')
        ->subject('Here’s your link to sign in to your Introcept Employee Portal Account');
    }
}
