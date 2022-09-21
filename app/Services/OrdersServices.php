<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class OrdersServices
{
    public function storeOrder($request){
        $order = new Order();
        $productsOrder = $request->get('products');
        $prices = 0;
        $pricesWithVat = 0;
        $store = Store::whereId($request->get('store_id'))->first();

        if($store->vat_type == Store::PERCENTAGE)
            $storeVat = $store->vat_value*(1/100);
        else
            $storeVat = $store->vat_value;

        foreach ($productsOrder as $productOrder) {
            $product = Product::whereId($productOrder['id'])->first();
            $prices += $product->price * $productOrder['quantity'];

            if($product->with_vat)
                $pricesWithVat += $product->price * $productOrder['quantity'];
            else
                $pricesWithVat += ($product->price * $productOrder['quantity'])+(($product->price * $productOrder['quantity'])*$storeVat);


        }

        $order->total                    = $prices;
        $order-> total_with_vat          = $pricesWithVat;
        $order-> total_with_shipping     = $prices+$store->cost_shipping;
        $order-> total_with_vat_shipping = $pricesWithVat+$store->cost_shipping;
        $order->user_id                  = Auth::user()->id;

        $this->storeOrderProducts($order, $productsOrder);
        return $order->toArray();

    }

    public function storeOrderProducts($order, $productsOrder){
        foreach ($productsOrder as $product)
        {
            OrderProduct::firstOrCreate([
                'product_id' => $product['id'],
                'quantity'   => $product['quantity'],
                'order_id'   => $order->id,
            ]);
        }
    }
}
