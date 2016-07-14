<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id'
    ];
    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','order_products')
            ->withTimestamps()->orderBy('created_at');
    }
}
