<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'totalprice',
        'cart_id'
    ];
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
