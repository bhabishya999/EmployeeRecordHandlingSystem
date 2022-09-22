<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeKeyEmploymentDetailResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'employee_id' =>$this->id,
            'key_employment_details' => new KeyEmploymentDetailProfileResource($this->keyEmploymentDetail)
        ];
    }
}
