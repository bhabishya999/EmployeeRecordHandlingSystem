<?php
namespace App\Talent\User;
use App\Models\User;

class UserManager
{
    public function __construct(private User $user)
    {

    }

    public function findByEmail(string $email):User
    {
        $user = $this->user->where('email',$email)->FirstOrFail();
        return $user;
    } 
}
