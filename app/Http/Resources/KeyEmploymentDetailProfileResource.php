<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeyEmploymentDetailProfileResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'organization' =>$this->organization,
            'join_date' => $this->join_date,
            'work_schedule' => $this->work_schedule,
            'manager' => $this->manager,
            'superpowers' => $this->superpowers,
            'team' => $this->team,
            'current_position' => $this->current_position,
            'manages' => ManageResource::collection($this->whenLoaded('manages'))
        ];
    }
}
