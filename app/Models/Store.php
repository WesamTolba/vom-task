<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    const PERCENTAGE = 'percentage';
    const VALUE = 'value';

    protected $fillable = [
        'name',
        'cost_shipping',
        'vat_type',
        'vat_value',
        'user_id'
        ];


    public function merchant(){
       return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePercentage($query)
    {
        return $query->where('vat_type', 'percentage');
    }

    public function scopeValue($query)
    {
        return $query->where('vat_type', 'value');
    }
}
