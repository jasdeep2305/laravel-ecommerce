<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:46
 */

namespace App\Http\Repositories;

use App\Cart;
use App\CartProduct;
use App\Contracts\Repository;
use Illuminate\Support\Facades\Auth;

class CartRepository implements Repository
{
    /**
     * Create a cart if doesn't exist for a user
     * Else return cart
     * @param $request
     * @return cart
     */
    public function createCart()
    {
        $user_id = null;

        if (Auth::check())
            $user_id = Auth::user()->id;

        if ($cart = Cart::where('user_id', $user_id)->first()) {
            return $cart;
        } else {
            $cart = Cart::create(['user_id' => $user_id]);
            return $cart;
        }

    }

    /**
     * Get the current cart
     * @return static
     */
    public function getCart()
    {
        $user_id = null;

        if (Auth::check())
            $user_id = Auth::user()->id;

        if ($cart = Cart::where('user_id', $user_id)->first()) {
            return $cart;
        } else {
            $cart = Cart::create(['user_id' => $user_id]);
            return $cart;
        }
    }

    /**
     * Remove products present in cart
     * @param $product_id
     * @param $cart_id
     * @return mixed
     */
    public function removeProduct($product_id, $cart_id)
    {
        return CartProduct::where('product_id', $product_id)->where('cart_id', $cart_id)->delete();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($id,$data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}