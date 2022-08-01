<?php
namespace App\Talent\PasswordReset;
use App\Models\PasswordReset;

class PasswordResetManager
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
