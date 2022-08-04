<?php

namespace App\Events;
use App\Models\User;

class ResetMail
{
    public function __construct(public string $email,public User|Model $user,public string $token)
    {
    }
}
