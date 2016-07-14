<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CartProductRepository;
use App\Http\Repositories\CartRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartProductController extends Controller
{
    private $cartProductRepository;
    private $cartRepository;


    /**
     * @param CartProductRepository $cartProductRepository
     * @param CartRepository $cartRepository
     */
    public function __construct(CartProductRepository $cartProductRepository, CartRepository $cartRepository)
    {
        $this->middleware('auth');
        $this->cartProductRepository=$cartProductRepository;
        $this->cartRepository=$cartRepository;
    }

    /**
     * Create a new Cart and
     * add products to cart
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        //get the card
         $cart = $this->cartRepository->createCart();
        
        // add product to cart
        $this->cartProductRepository->addProductsToCart($request->all(), $cart);
        return redirect('/cart');
        
    }

    /**
     * Remove a product from cart
     * @param $productid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($productid)
    {
        $this->cartProductRepository->removeProductFromCart($productid);
        return redirect()->back();
    }

    /**
     * Chnage quantity of a product in cart
     * @param $productid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        //get the card
        $cart = $this->cartRepository->createCart(); 
        
        $this->cartProductRepository->updateProductQuantity($request,$cart);
        return redirect()->back();

    }
}
