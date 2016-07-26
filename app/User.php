<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relation between User and Order
     * 1 to Many
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

//    public function order_products()
//    {
//        return $this->hasManyThrough('App\OrderProduct','App\Order');
//    }
//
//    public function cart_products()
//    {
//        return $this->hasManyThrough('App\CartProduct','App\Cart');
//    }
}
