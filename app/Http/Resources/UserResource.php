<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class UserResource extends JsonResource
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
            'name'          => $this->name,
            'lastname'      => $this->lastname,
            'id_number'     => $this->id_number,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'birthday'      => $this->birthday,
            'gender'        => $this->gender,
            'role_id'       => $this->role->name,
            'work_position' => $this->work_position,
            'url_image'     => $this->url_image,
            'key'           => $this->id,
            'created_at'    => $this->created_at->format('Y-m-d'),
            'updated_at'    => $this->updated_at->format('Y-m-d'),
            //'profession_id' => $this->profession_id,
        ];
    }
}
