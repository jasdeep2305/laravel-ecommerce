<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = [
        'product_id',
        'quantity'
    ];
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
