<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:49
 */

namespace App\Http\Repositories;


use App\CartProduct;
use Illuminate\Http\Request;

class CartProductRepository
{
    /**
     * @var CartRepository
     */
    private $cartRepository;

    /**
     * CartProductRepository constructor.
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Add products to Cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    public function addProductsToCart($request, $cart)
    {
        //dd($cart->id);
        $params = $this->params($request, $cart);
        //dd($params);
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
       // dd($cart->all());
       // dd($cart->id);
        return [
            'product_id' => $request['product_id'],
            'cart_id' => $cart->id,
            'quantity' => $request['quantity'],
           'totalprice' => $request['totalprice']
        ];

       // dd($params);
    }

    /**
     * Remove a product from cart
     * @param $productid
     * @return mixed
     */
    public function removeProductFromCart($product_id)
    {

        $cart= $this->cartRepository->getCart();

        return CartProduct::where('product_id',$product_id)->where('cart_id',$cart->id)->delete();

        
    }
}