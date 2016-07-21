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
     * Get the current cart
     * If cart not present, create a new cart
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
     * @param $id
     * @return mixed
     * @internal param $product_id
     * @internal param $cart_id
     */
    public function removeProduct($product_id, $cart_id)
    {
        return CartProduct::where('product_id', $product_id)->where('cart_id', $cart_id)->delete();
    }


    /**
     * Add a new product to the cart
     * @param $request
     * @param $cart
     * @return static
     */
    public function addProduct($request, $cart)
    {
        $current_quantity = 0;
        if ($this->checkIfProductInCart($request, $cart) > 0) {
            $current_quantity = $this->getProductQuantityInCart($request, $cart);
        }
        if ($current_quantity > 0) {
            $updated_quantity = $request['quantity'] + $current_quantity;
            $cartProduct = CartProduct::where('product_id', $request['product_id'])
                ->where('cart_id', $cart->id)
                ->update(['quantity' => $updated_quantity]);

            return $cartProduct;
        }

        $params = $this->params($request, $cart);
        $cartProduct = CartProduct::create($params);
        return $cartProduct;
    }

    /**
     * Fetch required parameters from request
     * @param $request
     * @param $cart
     * @return array
     */
    private function params($request, $cart)
    {
        return [
            'product_id' => $request['product_id'],
            'cart_id' => $cart->id,
            'quantity' => $request['quantity'],
            'totalprice' => $request['price']
        ];
    }

    /**
     * Check if a product is already added in Cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    private function checkIfProductInCart($request, $cart)
    {
        return (CartProduct::where('product_id', $request['product_id'])->where('cart_id', $cart->id)->count());
    }

    /**
     * Get the quantity of a product present in cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    private function getProductQuantityInCart($request, $cart)
    {
        return CartProduct::where('product_id', $request['product_id'])
            ->where('cart_id', $cart->id)
            ->first()->quantity;
    }

    /**
     * Update Product Quantity for a product present in cart
     * @param $request
     * @param $cart
     */
    public function updateProductQuantity($request, $cart)
    {
        $cartProduct = CartProduct::where('product_id', $request['product_id'])
            ->where('cart_id', $cart->id)
            ->update(['quantity' => $request['updated_quantity']]);
        return $cartProduct;
    }


    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }


    public function create()
    {
    }

}