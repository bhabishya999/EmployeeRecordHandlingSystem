<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveListResource extends JsonResource
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
            'id'=>$this->id,
            'form_id'=>$this->form_id,
            'leave_type'=>$this->leave_type,
            'leave_start_date'=>$this->leave_start_date,
            'leave_end_date'=>$this->leave_end_date,
            'leave_apporved'=>$this->leave_approved,
            'employees'=>new EmployeeResource ($this->whenLoaded('employee'))
        ];
    }
}
