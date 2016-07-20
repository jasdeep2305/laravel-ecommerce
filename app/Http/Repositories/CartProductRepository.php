<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:49
 */

namespace App\Http\Repositories;


use App\CartProduct;
use App\Contracts\Repository;

class CartProductRepository implements Repository
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
     * Update the quantity, if product is already present in the cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    public function addProductsToCart($request, $cart)
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
     * fetch required parameters
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
     * Remove a product from cart
     * @param $productid
     * @return mixed
     */
    public function removeProductFromCart($product_id)
    {
        return $this->delete($product_id);
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
     * Call update Method to Update Product Quantity in a Cart
     * @param $request
     * @param $cart
     * @return mixed
     */
    public function updateProductQuantity($request, $cart)
    {
        return $this->update($request, $cart);
    }


/*
     * Interface methods
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        // TODO: Implement all() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * Update Product Quantity
     * @param $request
     * @param $cart
     * @return mixed
     */
    public function update($request, $cart)
    {
        $cartProduct = CartProduct::where('product_id', $request['product_id'])
            ->where('cart_id', $cart->id)
            ->update(['quantity' => $request['updated_quantity']]);
        return $cartProduct;
    }

    /**
     * Remove a product from Cart
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $product_id = $id;
        $cart = $this->cartRepository->getCart();
        return CartProduct::where('product_id', $product_id)->where('cart_id', $cart->id)->delete();
    }
}