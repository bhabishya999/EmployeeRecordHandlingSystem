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
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $token = $request->user()->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message'=>'Logged in successfully',
            ],200);
        }
         if (!password_verify('password',$password)){
            return response([
                'message'=>'Incorrect password.Try again or click Forgot Password to reset it',
            ],401);
         }
    }

}
