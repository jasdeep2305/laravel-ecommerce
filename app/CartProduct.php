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

    /**
     * Relation between Cart Product and Products
     * 1 to Many
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
}
