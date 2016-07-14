<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrderRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();
        return view('order.show', compact('orders'));
    }
}
