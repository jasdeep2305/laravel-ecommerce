<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:49
 */

namespace App\Http\Repositories;


use App\CartProduct;

class CartProductRepository
{
    /**
     * CartProductRepository constructor.
     */
    public function __construct()
    {
    }

    /**
     * Add products to Cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    public function addProductsToCart($request, $cart)
    {
        $params = $this->params($request, $cart);
        $cartProduct = CartProduct::create($params);
        return $cartProduct;
    }

    /**
     * fetch required parameters
     * @param $request
     * @param $cart
     * @return array
     */
    private function params($request, $cart)
    {
        return [
            'product_id' => $request->product_id,
            'cart_id' => $cart->id,
            'quantity' => $request->quantity,
            'totalprice' => $request->totalprice
        ];
    }
}