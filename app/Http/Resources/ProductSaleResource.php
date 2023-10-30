<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $quantity = 0;
        foreach ($this->invoices as $invoice) {
           $quantity = $invoice->pivot->quantity;
        }

        return [
            'id'                 => $this->id,
            'name'               => $this->name,
            'price'              => $this->price,
            'quantity_available' => $this->quantity_available,
            'IVA'                => $this->IVA,
            'url_image'          => $this->url_image,
            'category_id'        => $this->category->name,
            'provider_id'        => $this->provider->name,
            'quantity'           => $quantity,
            'key'                => $this->id,
            'created_at'         => $this->created_at->format('Y-m-d'),
            'updated_at'         => $this->updated_at->format('Y-m-d'), 
        ];
    }
}
