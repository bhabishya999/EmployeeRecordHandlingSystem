<?php
namespace App\Talent\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

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
    public function authenticatedUser(): Model|Collection|Builder|array|null
    {
        return $this->user->with('employees:user_id,email,avatar')->findOrFail(Auth::id(),['id','name']);
    }
}
