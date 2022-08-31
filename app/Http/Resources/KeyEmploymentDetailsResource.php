<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeyEmploymentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           'employee_id'=>$this->employee_id,
           'current_position'=>$this->current_position,
           'work_schedule'=>$this->work_schedule,
           'team'=>$this->team
        ];
    }
}
