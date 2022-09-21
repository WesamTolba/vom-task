<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'name',
        'description',
        'with_vat',
        'price',
        'store_id'
    ];
    public $translatable = ['name', 'description'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }

}
