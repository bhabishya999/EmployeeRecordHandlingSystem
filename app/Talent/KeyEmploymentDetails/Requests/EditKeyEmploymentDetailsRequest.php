<?php

namespace App\Talent\KeyEmploymentDetails\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKeyEmploymentDetailsRequest extends FormRequest
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
            'organization' => 'required',
            'join_date' => 'required|date',
            'current_position' => 'required|string',
            'work_schedule' => 'required|string',
            'team' => 'required|string',
            'manager' => 'required|exists:employees,id',
            'manages' => 'sometimes',
            'manages.*.manages_id' => 'sometimes',
            'manages.*.employee_id' => 'sometimes|exists:employees,id',
            'superpowers' => 'required|array'
        ];
    }
}
