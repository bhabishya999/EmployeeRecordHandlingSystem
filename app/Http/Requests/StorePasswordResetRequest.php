<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class StorePasswordResetRequest extends FormRequest
{
    
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'password'=>[
                'required',
                'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'token' => 'required|exists:password_resets',
            
        ];
    }
}
