<?php

namespace App\Talent\Employee\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeEditRequest extends FormRequest
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
      $employeeId=$this->route()->parameter('employeeId');
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
             'email'=>['required','email',Rule::unique('employees','id')->ignore($employeeId)],
            'contact_number'=>'required|string',
            'date_of_birth'=>'required|date',
            'current_address'=>'required|string',
            'pan_number'=>'string|nullable',
            'bank_account_number'=>'string|nullable',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png',
            'documents'=>'sometimes',
            'documents.*'=>'max:5000|mimes:pdf,png,jpg,jpeg',
            'document_id'=>'sometimes|exists:documents,id'
        ];
    }
    public function messages()
    {
      return [
        'documents.max' => "Error uploading file:File too big.Max file size:5MB",
      ];
    }
}
