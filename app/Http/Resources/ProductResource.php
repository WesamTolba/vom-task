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
            'product_name_en' => $this->translations['name']['en'],
            'product_name_ar' => $this->translations['name']['ar'],
            'description_en'  => $this->translations['description']['en'],
            'description_ar'  => $this->translations['description']['ar'],
            'price'           => $this->price,
            'with_vat'        => $this->with_vat,
        ];
    }
}
