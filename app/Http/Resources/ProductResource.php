<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'                 => $this->id,
            'name'               => $this->name,
            'price'              => $this->price,
            'quantity_available' => $this->quantity_available,
            'IVA'                => $this->IVA,
            'url_image'          => $this->url_image,
            'category_id'        => $this->category->id,
            'provider_id'        => $this->provider->id,
            'category'           => $this->category->name,
            'provider'           => $this->provider->name.' '.$this->provider->lastname,
            'key'                => $this->id,
            'created_at'         => $this->created_at->format('Y-m-d'),
            'updated_at'         => $this->updated_at->format('Y-m-d'),
        ];
    }
}
