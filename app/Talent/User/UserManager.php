<?php
namespace App\Talent\User;
use App\Models\User;

class UserManager
{
    public function __construct(private User $user)
    {

    }
    public function store(string $first_name,string $email,int $employee_id){
        $user=$this->user->create([
            'name'=>$first_name,
            'email'=>$email,
            'password'=>'$2a$12$epwbSPXEi57FYWr/iwFQ9untr.uztuEz4HUldodIRuNDgR3hYdbAW', // Introcpet@123
            'role'=>'user',
            'employee_id'=>$employee_id,
        ]);
    }

    public function findByEmail(string $email):User
    {
        $user = $this->user->where('email',$email)->FirstOrFail();
        return $user;
    } 
}
