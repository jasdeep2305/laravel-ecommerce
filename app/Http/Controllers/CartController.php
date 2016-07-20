<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Http\Repositories\CartRepository;
use App\Http\Requests;

class CartController extends Controller
{
    /**
     * @var CartRepository
     */
    private $cartRepository;

    /**
     * CartController constructor.
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
   {
       $this->middleware('auth');
    
       $this->cartRepository = $cartRepository;
   }

    /**
     * View the Cart for a user
     * If cart is not present create a new cart
     * @param Cart $cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cart = $this->cartRepository->createCart();
        return view('cart.index', compact('cart'));
    }

}
