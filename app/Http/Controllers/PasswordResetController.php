<?php

namespace App\Http\Controllers;


use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePasswordResetRequest;
use App\Models\User;
use App\Talent\User\Manager;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;



class PasswordResetController extends Controller
{

    public function __construct(private PasswordReset $passwordReset, private User $user, private Manager $userManager, private Manager $passwordManager)
    {
        
    }
    
    
    
    public function reset(StorePasswordResetRequest $request):Response
    {
        

        $validated = $request->validated();

        // $passwordReset = $this->passwordReset->where('token',$validated['token'] )->first();
        $passwordReset = $this->passwordManager->findByToken($validated['token']);

        if(!$passwordReset){

            return response([

                'message' =>'Token is Invalid or Expired!',
                'status' =>'failed'

            ],Response::HTTP_NOT_FOUND);

        }

        $user = $this->userManager->findByEmail($passwordReset->email);
        if(!$user){
            return response([
                'message' => 'User not registered!', 
                'status' => 'failed'
            ],Response::HTTP_NOT_FOUND);
        }


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
        $this->passwordReset->where('email', $user->email)->delete();

        return response([
            'message' => 'Password reset success!', 
            'status' => 'success'
            
        ],Response::HTTP_OK);

    }


    public function expiryLink()
    {
        return URL::temporarySignedRoute(
            'reset', now()->addSecond(5)
        );
    }

    
    public function resetPassword(Request $request)
    {
        if (! $request->hasValidSignature()) {
            return response([
                'message'=>'Link expried please try again',
                "status" => 'failed'
            ],Response::HTTP_NOT_FOUND);
        }
        return 'display form';
    }
}
