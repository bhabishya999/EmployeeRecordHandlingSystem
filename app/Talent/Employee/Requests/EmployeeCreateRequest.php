<?php

namespace App\Talent\Employee\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
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
            'contact_number'=>'required|string',
            'date_of_birth'=>'required|date_format:m/d/Y',
            'current_address'=>'required',
            'pan_number'=>'required|string',
            'bank_account_number'=>'required|string',
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
