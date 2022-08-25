<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'status'=>$this->status,
            'contact_number' => $this->contact_number,
            'date_of_birth' => $this->date_of_birth,
            'current_address' => $this->current_adddress,
            'pan_number' => $this->pan_number,
            'bank_account_number' => $this->bank_account_number,
        ];
    }
}
