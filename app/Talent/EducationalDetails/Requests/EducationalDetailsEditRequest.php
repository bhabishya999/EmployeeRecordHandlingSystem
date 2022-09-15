<?php

namespace App\Talent\EducationalDetails\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationalDetailsEditRequest extends FormRequest
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
            'educational_details.*.education_id'=>'sometimes|exists:educational_details,id',
            'educational_details.*.education_level' => 'required|string',
            'educational_details.*.passed_year' => 'required|date_format:Y|before_or_equal:' . now()->format('Y'),
            'educational_details.*.institution' => 'required|string',
            'educational_details.*.employee_id'=>'required|exists:employees,id'
        ];
    }
}
