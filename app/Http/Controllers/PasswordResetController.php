<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\StorePasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Response;

class PasswordResetController extends Controller
{
    
    public function reset(StorePasswordResetRequest $request, $token){

        $passwordreset = PasswordReset::where('token', $token)->first();

        if(!$passwordreset){

            return response([

                'message' =>'Token is Invalid or Expired!',
                'status' =>'failed'

            ],Response::HTTP_NOT_FOUND);

        }

        $user = User::where('email', $passwordreset->email)->first();
        if(!$user){
            return response([
                'message' => 'User not registered!', 
                'status' => 'failed'
            ],Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validated();
       

        if (Hash::check($validated['password'], $user->password)) {
            // The passwords match...
            return response([

                'message'=>'New password should not same as old password!',
                'status' => 'failed'

            ],Response::HTTP_CONFLICT);

        }

        $user->password = Hash::make($request->password);
        $user->save();

        //Delete the token after resetting the password
        PasswordReset::where('email', $user->email)->delete();

        return response([
            'message' => 'Password reset success!', 
            'status' => 'success'
            
        ],Response::HTTP_OK);

    }
}
