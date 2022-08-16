<?php
namespace App\Talent\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManager
{
    public function __construct(private User $user)
    {

    }
    public function store(array $userArray){
        $user=$this->user->create(
            $userArray,
    );
    }

    public function fetchID(string $email):int{
        $user_id=$this->user->where('email',$email)->FirstOrFail();
        return $user_id->id;
    }

    public function findByEmail(string $email):User
    {
        $user = $this->user->where('email',$email)->FirstOrFail();
        return $user;
    } 
}
