<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'store_name' => $this->name,
            'cost_shipping'=> $this->cost_shipping,
            'vat_type'=> $this->vat_type,
            'vat_value'=> $this->vat_value,
        ];
    }
}
