<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthUserResource;
use App\Http\Resources\UserResource;
use App\Talent\User\UserManager;

class UserController extends Controller
{
    public function __construct(private UserManager $userManager)
    {

    }

    public function show()
    {
        $authUser = $this->userManager->authenticatedUser();
        return new UserResource($authUser);
    }
}
