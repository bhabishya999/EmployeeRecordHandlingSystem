<?php

namespace App\Policies;

use App\Models\User;
use App\Models\policy;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationalDetailsPolicy
{
    use HandlesAuthorization;

   public function isAdmin(User $user){
    return $user->role ==='admin';
   }
}
