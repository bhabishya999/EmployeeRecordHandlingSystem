<?php
namespace App\Talent\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManager
{
    public function __construct(private User $user)
    {

    }
    public function store(array $userArray):User{
        $user=$this->user->create($userArray);
        return $user;
    }

    public function findbyEmail(string $email):User
    {
        $user = $this->user->where('email',$email)->FirstOrFail();
        return $user;
    } 
}
