<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'placed_on',
        'delivered_on',
        'bill_amount'
    ];

    /**
     * Relation between Order and Order Products
     * 1 to Many
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }

    /**
     * Relation between Order and User
     * 1 to 1
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation between Order and Products
     *
     * @return mixed
     */
    public function products()
    {
        return $this->belongsToMany('App\Product','order_products')
            ->withTimestamps()->orderBy('created_at');
    }
}
