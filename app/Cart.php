<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id'
    ];

    /**
     * Relation between Cart and User
     * 1 to 1
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation between Cart and Cart Products
     * 1 to Many
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
    return( $this->belongsToMany('App\Product', 'cart_products')
        ->withPivot(['quantity', 'totalprice'])
        );
//
       // ->withTimestamps()->orderBy('created_at')
//        $this->belongsToMany('App\Product', 'cart_products')
//            ->withPivot(['quantity', 'totalprice'])
//            ->withTimestamps()
//            ->wherePivotIn('quantity', [3,4,5]);
        //dd( $this->hasManyThrough('App\Product', 'App\CartProduct', 'cart_id', 'id'));
    }
}
