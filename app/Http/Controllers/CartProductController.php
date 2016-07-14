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

    public function destroy($productid)
    {
        $this->cartProductRepository->removeProductFromCart($productid);
        return redirect()->back();
    }
}
