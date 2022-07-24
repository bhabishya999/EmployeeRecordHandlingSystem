<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|exists:users',
            'password'=>'required',
        ],['email.exists'=>'Sorry,we couldnot recognize this email']);

        $email=$request->email;
        $password=$request->password;
        
        if (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'admin'])) {
            $token = $request->user()->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message'=>'Admin logged in successfully',
            ],200);
        }
        
        if (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'user'])) {
            $token = $request->user()->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message'=>'User logged in successfully',
            ],200);
        }
         if (!password_verify('password',$password)){
            return response([
                'message'=>'Incorrect password.Try again or click Forgot Password to reset it',
            ],401);
         }
    }

}
