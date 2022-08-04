<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class PasswordResetMail extends Mailable
{
    public function __construct(public User|Model $user,public string $token)
    {
    
    }

    public function build()
    {
        return $this->view('password_reset_email')
        ->subject('Here’s your link to sign in to your Introcept Employee Portal Account');
    }
}
