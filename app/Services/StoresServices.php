<?php

namespace App\Services;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoresServices
{
    public function creatStore($request){
        $store = new Store();
        $store->name          = $request->get('name');
        $store->cost_shipping = $request->get('cost_shipping');
        $store->vat_type      = $request->get('vat_type');
        $store->vat_value     = $request->get('vat_value');
        $store->user_id       = Auth::user()->id;
        return $store->toArray();
    }
}
