<?php
namespace App\Talent\User;
use App\Models\User;
use App\Models\PasswordReset;


class Manager
{
    public function __construct(private User $user, private PasswordReset $passwordReset)
    {
        
    }

    public function findByEmail(string $email):User
    {
        
        $user = $this->user->where('email','=',$email)->FirstOrFail();
        return $user;

    }


    public function findByToken(string $token):PasswordReset
    {

        $user = $this->passwordReset->where('token','=',$token)->FirstOrFail();
        return $user;

    }

    public function deleteEmail(string $email): Void
    {
         $this ->passwordReset->where('email', $email) -> delete();
        
    }

    
}