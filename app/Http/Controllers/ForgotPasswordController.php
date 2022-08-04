<?php

namespace App\Http\Controllers;


use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePasswordResetRequest;
use App\Models\User;
use App\Talent\User\Manager;
use Illuminate\Http\Response;
use Carbon\Carbon;

use Illuminate\Http\Request;



class ForgotPasswordController extends Controller
{

    public function __construct(private PasswordReset $passwordReset, private User $user, private Manager $userManager, private Manager $passwordManager)
    {
        
    }
    
    
    public function reset(StorePasswordResetRequest $request) :Response
    {
        

        $validated = $request->validated();

        
        $passwordReset = $this->passwordManager->findByToken($validated['token']);


        $isTokenValid = (Carbon::now())->lessThanOrEqualTo( $passwordReset->created_at->addDays(4));

        if(!$isTokenValid){

            return responseHelper('Token Expired Or Invalid', Response::HTTP_NOT_FOUND, 'Failed');

        }

        $user = $this->userManager->findByEmail($passwordReset->email);

        if (Hash::check($validated['password'], $user->password)) {
           
            return responseHelper('New password should not same as old password!', Response::HTTP_CONFLICT, 'Failed');

        }

        $user->password = Hash::make($request->password);
        $user->save();

        //Delete the token after resetting the password

        $this->passwordManager->deleteEmail($user->email);

        return responseHelper('Password reset success!');

    }


    public function validateToken(Request $request):Response
    {
        $token = $request->get('token');

        $passwordResetInstance = $this ->passwordManager->findByToken($token);

        $isTokenValid = (Carbon::now())->lessThanOrEqualTo($passwordResetInstance->created_at->addDays(4));

       if(!$isTokenValid)
       {
            
        
        return responseHelper('Token Expired Or Invalid', Response::HTTP_NOT_FOUND, 'Failed');
            
       }

        return responseHelper('OK');

    }
}
