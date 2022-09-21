<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_name'               => $this->user->name,
            'total'                   => $this->total,
            'total_with_vat'          => $this->total_with_vat,
            'total_with_shipping'     => $this->total_with_shipping,
            'total_with_vat_shipping' => $this->total_with_vat_shipping,
            'store_shipping_cost'     => $this->total_with_shipping - $this->total,
            'store_vat_settings'      => $this->total_with_vat -  $this->total
        ];
    }
}
