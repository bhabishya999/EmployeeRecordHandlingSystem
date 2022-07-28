<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class PasswordResetController extends Controller
{
    public function reset_email(PasswordResetRequest $request){
        $validated = $request->validated();
        $token=Str::random(60);
        PasswordReset::create([
            'email'=>$validated['email'],
            'token'=>$token,
        ]);
        $user=User::where('email',$validated['email'])->first();
        $mail=Mail::to($validated['email'])->send(new PasswordResetMail($user,$token));
        if($mail){
            return response([
                'message'=>"Password reset email sent suceesfully",
            ],Response::HTTP_OK);
        }
        return response([
            'message'=>"Failed to send passport reset email",
        ],Response::HTTP_UNAUTHORIZED);
    }
}
