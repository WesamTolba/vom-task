<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductServices
{
    public function storeProduct($request){
        $product = new Product();
        $product->setTranslation('name', 'ar', $request->get('name_ar'));
        $product->setTranslation('name', 'en', $request->get('name_en'));
        $product->setTranslation('description', 'ar', $request->get('desc_ar'));
        $product->setTranslation('description', 'en', $request->get('desc_en'));
        $product->price = $request->get('price');
        $product->with_vat = $request->get('with_vat');
        $product->store_id = Auth::user()->stores()->first()->id;
        return $product->toArray();
    }
}
