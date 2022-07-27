<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\StorePasswordResetRequest;
use App\Models\User;

class PasswordResetController extends Controller
{
    
    public function reset(StorePasswordResetRequest $request, $token){

        $passwordreset = PasswordReset::where('token', $token)->first();

        if(!$passwordreset){

            return response([

                'message' =>'Token is Invalid or Expired!',
                'status' =>'failed'

            ],404);

        }

        $user = User::where('email', $passwordreset->email)->first();

        if (Hash::check($request->password, $user->password)) {
            // The passwords match...
            return response([

                'message'=>'Reset password should not same as old password!',
                'status' => 'failed'

            ], 404);

        }

        $user->password = Hash::make($request->password);
        $user->save();

        //Delete the token after resetting the password
        PasswordReset::where('email', $user->email)->delete();

        return response([
            'message' => 'Password reset sucesss!', 
            'status' => 'sucess'
        ],200);

    }
}
