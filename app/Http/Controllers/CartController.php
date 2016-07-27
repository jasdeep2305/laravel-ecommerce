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
        $cart = $this->cartRepository->getCart();
        return view('cart.index', compact('cart'));
    }

    /**
     * Adding Products to Cart
     *
     * @method POST
     * @url /cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addProduct(Request $request)
    {
        $cart = $this->cartRepository->getCart();
        $this->cartRepository->addProduct($request, $cart);
        return redirect('/cart');
    }

    /**
     * Remove a product from cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeProduct(Request $request)
    {
        $cart = $this->cartRepository->getCart();

        $query = $this->cartRepository->removeProduct($request->product_id, $cart->id);

        if ($request->ajax()) {

            if ($query)
                return 'true';

            return 'false';
        }

        return redirect()->back();
    }

    /**
     * Update Quantity of a Product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $productid
     */

    public function updateProductQuantity(Request $request)
    {
        //get the cart
        $cart = $this->cartRepository->getCart();
        $this->cartRepository->updateProductQuantity($request, $cart);

//        if ($request . response(200)) {
//
//            return redirect('/products');
//        }
        // if ajax request
//        if ($request->ajax()) {
//            return 'true';
//        }

        return redirect()->back();
    }

}