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
        OrderProductRepository $orderProductRepository,
        ProductRepository $productRepository,
        CartProductRepository $cartProductRepository,
        CartRepository $cartRepository
    )
    {

        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->productRepository = $productRepository;
        $this->cartProductRepository = $cartProductRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();
//        return $orders;
        return view('order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderRepository->find($id);
        $orderProduct = $this->orderProductRepository->getProductsForOrder($id);
        return view('order.show', compact('orderProduct', 'order'));

//        $orderProducts=$this->productRepository->getAllProductsForOrder($id);
//        return view('order.show',compact('orderProducts'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $new_order = $this->orderRepository->addNewOrder();
        $this->orderProductRepository->addProductToYourOrders($request->all(), $new_order);
        // $this->orderProductRepository->addProductToYourOrders($request->all());
        return redirect('/orders');


    }

    public function confirmation(Request $request)
    {
        //dd($request->all());
        //$this->dispatch(new CreateNewOrder($request));
        $cart=$this->cartRepository->getCart();

        $this->cartProductRepository->addProductsToCart($request,$cart);
        return view('order.confirmation');
    }

}
