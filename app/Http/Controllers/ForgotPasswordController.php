<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\User;
use App\Talent\User\UserManager;
use App\Talent\ForgotPassword\ForgotPasswordManager;
use App\Events\ForgotPassword;

class ForgotPasswordController extends Controller
{
    public function __construct(private UserManager $userManager, private ForgotPasswordManager $passwordManager)
    {

    }
    public function resetEmail(ForgotPasswordRequest $request){
        $validated = $request->validated();
        $token=Str::random(60);
        $passwordReset=$this->passwordManager->store($validated['email'],$token);
        $user=$this->userManager->findbyEmail($validated['email']);
        event(new ForgotPassword($validated['email'],$user,$token));
        return response([
            'message'=>"Password reset email sent suceesfully",
        ],Response::HTTP_OK);
    }
}
