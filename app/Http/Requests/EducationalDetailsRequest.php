<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationalDetailsRequest extends FormRequest
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
            'educational_details' => ['required', 'array'],
            'educational_details.*.education_level' => 'required|string',
            'educational_details.*.passed_year' => 'required|date',
            'educational_details.*.institution' => 'required|string',
            'educational_details.*.employee_id'=> 'required|integer',
            'educational_details.*.user_id' => 'required|numeric'
            
        ];

        
    }
}
