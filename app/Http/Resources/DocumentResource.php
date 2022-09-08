<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'document_id' => $this->id,
            'original_name' =>$this->original_name,
            'type' => $this->type,
            'path'=>$this->when(!empty($this->path),fn()=>asset('/storage/'.$this->path),null)
        ];
    }
}
