<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Http\Repositories\CartRepository;
use App\Http\Requests;
use Illuminate\Http\Request;

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
       $this->cartRepository = $cartRepository;
   }

    /**
     * Create a cart
     * @param Request $request
     */
    public function store()
    {
        $this->cartRepository->store();
        return redirect('/carts');
    }


    /**
     * view Cart
     * @param Cart $cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cart = $this->cartRepository->createCart();
        return view('cart.index', compact('cart'));
    }

}
