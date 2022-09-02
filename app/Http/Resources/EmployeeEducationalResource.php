<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeEducationalResource extends JsonResource
{

    public function toArray($request): array
    {
        return[
            'employee_id' => $this->id,
            'educational_details' => EducationalDetailResource::collection($this->whenLoaded('educationalDetail'))
        ];
    }
}
