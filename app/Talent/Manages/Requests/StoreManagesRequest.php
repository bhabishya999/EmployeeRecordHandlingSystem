<?php

namespace App\Talent\Manages\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'manages' => ['required', 'array'],
            'manages.*' => 'required|exists:employees,id'
        ];
    }
}
