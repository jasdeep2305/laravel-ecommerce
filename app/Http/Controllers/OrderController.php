<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CartProductRepository;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\OrderProductRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var OrderProductRepository
     */
    private $orderProductRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CartProductRepository
     */
    private $cartProductRepository;
    /**
     * @var CartRepository
     */
    private $cartRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        CartProductRepository $cartProductRepository,
        CartRepository $cartRepository
    )
    {
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->cartProductRepository = $cartProductRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * This function shows list of all the orders for the current user.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->orderRepository->all();
        return view('order.index', compact('orders'));
    }

    /**
     * This function fetches the data for the details for a particular order
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);
        $orderProduct = $this->orderRepository->getProductsForOrderFromOrderProduct($id);
        return view('order.show', compact('orderProduct', 'order'));
    }

    /**
     * for adding a new order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($request->confirmation == 'no') {
            return redirect()->to('/products');
        }
        $this->orderRepository->create();
        return redirect('/orders');
    }

    /**
     * Confirmation to place the order
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmation(Request $request)
    {
        $cart = $this->cartRepository->getCart();
        $this->cartProductRepository->addProductsToCart($request, $cart);
        return view('order.confirmation');
    }

    /**
     * Making the payment of the order using order_id
     * @param $order_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment($order_id)
    {
        $details = $this->orderRepository->find($order_id);
        return view('order.payment', compact('details'));
    }

}
