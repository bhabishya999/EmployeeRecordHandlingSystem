<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
       
        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $token = $request->user()->createToken($request->email)->plainTextToken;
            return response([
                'token'=>$token,
                'message'=>'Logged in successfully',
            ],Response::HTTP_OK);
        }
        
        if(!password_verify('password',$validated['password'])){
            return response([
                'message'=>'Incorrect password.Try again or click Forgot Password to reset it',
            ],Response::HTTP_UNAUTHORIZED);
         }
    }

}
