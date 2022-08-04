<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Talent\User\UserManager;
use App\Talent\PasswordReset\PasswordResetManager;
use App\Events\ResetMail;

class PasswordResetController extends Controller
{
    public function __construct(private UserManager $userManager, private PasswordResetManager $passwordManager)
    {
        
    }
    public function resetEmail(PasswordResetRequest $request){
        $validated = $request->validated();
        $token=Str::random(60);
        $passwordReset=$this->passwordManager->store($validated['email'],$token);
        $user=$this->userManager->findbyEmail($validated['email']);
        event(new ResetMail($validated['email'],$user,$token));
        return response([
                'message'=>"Password reset email sent suceesfully",
        ],Response::HTTP_OK);
    }
}
