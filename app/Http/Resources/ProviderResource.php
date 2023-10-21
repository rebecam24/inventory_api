<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
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
            'id'            => $this->id,
            'key'           => $this->id,
            'name'          => $this->name,
            'lastname'      => $this->lastname,
            'id_number'     => $this->id_number,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'description'   => $this->description,
            'created_at'    => $this->created_at->format('Y-m-d'),
            'updated_at'    => $this->updated_at->format('Y-m-d'),
        ];
    }
}
