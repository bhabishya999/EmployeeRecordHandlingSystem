<?php

namespace App\Http\Resources;

use App\Talent\Employee\Model\Employee;
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
            'manager' =>Employee::with('keyEmploymentDetail:id,employee_id')->find($this->manager,['id','first_name','last_name']),
            'superpowers' => $this->superpowers,
            'team' => $this->team,
            'current_position' => $this->current_position,
            'manages' => ManageResource::collection($this->whenLoaded('manages'))
        ];
    }
}
