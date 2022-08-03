<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The order instance.
     *
     */
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public User|Model $user,public string $token)
    {
    
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('password_reset_email')
        ->subject('Here’s your link to sign in to your Introcept Employee Portal Account');
    }
}
