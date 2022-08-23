<?php

namespace App\Talent\KeyEmploymentDetails\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeyEmploymentDetailsRequests extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'organization' => 'required',
            'join_date' => 'required|date',
            'current_position' => 'required|string',
            'team' => 'required|string',
            'manager' => 'required|exists:employees,id',
            'manages' => ['required', 'array', 'distinct'],
            'manages.*' => 'required|exists:employees,id',
            'superpowers' => 'required|string'
        ];
    }
}
