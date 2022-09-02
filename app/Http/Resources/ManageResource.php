<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManageResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'key_employment_detail_id' => $this->key_employment_detail_id,
            'employee_id' => $this->employee_id
        ];
    }
}
