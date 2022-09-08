<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeProfileResource extends JsonResource
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
            'employee_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'date_of_birth' => $this->date_of_birth,
            'pan_number' => $this->pan_number,
            'current_address' => $this->current_address,
            'bank_account_number' => $this->bank_account_number,
            'avatar' => $this->when(!empty($this->avatar),fn()=>asset('/storage/'.$this->avatar),null),
            'documents' => DocumentResource::collection($this->whenLoaded('documents'))
        ];
    }
}
