<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CartProductRepository;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\OrderProductRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests;
use App\Tasks\CreateNewOrder;
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
        OrderProductRepository $orderProductRepository,
        ProductRepository $productRepository,
        CartProductRepository $cartProductRepository,
        CartRepository $cartRepository
    )
    {
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
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
        $orders = $this->orderRepository->getAllOrders();
        return view('order.index', compact('orders'));
        // return $orders;
    }

    /**
     * This function fetches the data for the details for a particular order
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);
        $orderProduct = $this->orderProductRepository->getProductsForOrder($id);
        return view('order.show', compact('orderProduct', 'order'));

//        $orderProducts=$this->productRepository->getAllProductsForOrder($id);
//        return view('order.show',compact('orderProducts'));
    }

    /**
     * for adding a new order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($request->confirmation == 'no') {
            //dd($request->all());
            return redirect()->to('/products');
        }
        $task = new CreateNewOrder();
        $task->handle();
        return redirect('/orders');
        //$new_order = $this->orderRepository->addNewOrder();
        //dd($request->all());
//        $new_order = $this->orderRepository->addNewOrder($request);
//        $this->orderProductRepository->addProductToYourOrders($request->all(), $new_order);
    }

    /**
     * Confirmation to place the order
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmation(Request $request)
    {
        //dd($request->all());
        //$this->dispatch(new CreateNewOrder($request));

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
