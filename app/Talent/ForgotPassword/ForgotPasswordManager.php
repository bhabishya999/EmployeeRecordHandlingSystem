<?php
namespace App\Talent\ForgotPassword;
use App\Models\PasswordReset;

class ForgotPasswordManager
{
    public function __construct(private PasswordReset $passwordReset)
    {

    }
    
    public function store(string $email,string $token)
    {
        $passwordReset= $this->passwordReset->create(['email'=>$email,
        'token'=>$token]);
    }    
}
