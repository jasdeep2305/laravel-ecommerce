<?php

namespace App\Http\Controllers;

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

    public function __construct(OrderRepository $orderRepository,OrderProductRepository $orderProductRepository,ProductRepository $productRepository)
    {

        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->productRepository = $productRepository;
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
        $orderProduct=$this->orderProductRepository->getProductsForOrder($id);
        return view('order.show',compact('orderProduct', 'order'));

//        $orderProducts=$this->productRepository->getAllProductsForOrder($id);
//        return view('order.show',compact('orderProducts'));
    }


}
