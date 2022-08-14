<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:employees,email',
            'country_code'=>'required',
            'contact_number'=>'required|numeric',
            'date_of_birth'=>'required',
            'current_address'=>'required',
            'pan_number'=>'required|numeric',
            'bank_account_number'=>'required',
            'avatar'=>'required|image|mimes:jpeg,png',
            'documents'=>'required',
            'documents.*'=>'max:5000|mimes:pdf,png,jpeg',
        ];
    }
    public function messages()
    {
      return [        
        'avatar.image'=> "Invalid image format",    
        'documents.max' => "Error uploading file:File too big.Max file size:5MB",
      ];
    }
   
}
