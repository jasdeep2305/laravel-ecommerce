<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cart_products()
    {
        return $this->hasMany('App\CartProduct');
    }

    /**
     * Return all products in cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\CartProduct', 'cart_id', 'id');
    }
}
