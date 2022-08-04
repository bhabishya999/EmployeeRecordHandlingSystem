<?php

namespace App\Events;
use App\Models\User;

class ForgotPassword
{
    public function __construct(public string $email,public User|Model $user,public string $token)
    {
    }
}