<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource as UserCollection;
use App\Http\Resources\ClientResource as ClientCollection;
use App\Http\Resources\ProductSaleResource as ProductCollection;
use App\Http\Resources\CurrencyResource as CurrencyCollection;
use App\Models\Product;

class InvoiceResource extends JsonResource
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
            'id'                => $this->id,
            'user_id'           => $this->user_id,
            'user_id'           => new UserCollection($this->user),
            'client_id'         => new ClientCollection($this->client),
            'products'          => ProductCollection::collection($this->products),
            'currency'          => CurrencyCollection::collection($this->currencies),
            'payment_method_id' => $this->paymentMethod->type,
            'total'             => $this->total,
            'key'               => $this->id,
            'created_at'        => $this->created_at->format('Y-m-d'),
            'updated_at'        => $this->updated_at->format('Y-m-d'),
        ];
    }
}
