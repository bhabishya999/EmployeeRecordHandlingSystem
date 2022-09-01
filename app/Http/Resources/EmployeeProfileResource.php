<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'id' => $this->id,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'date_of_birth' => $this->date_of_birth,
            'pan_number' => $this->pan_number,
            'current_address' => $this->current_address,
            'bank_account_number' => $this->bank_account_number,
            'avatar' => Storage::url($this->avatar),
            'documents' =>DocumentResource::collection($this->whenLoaded('documents'))
        ];
    }
}
