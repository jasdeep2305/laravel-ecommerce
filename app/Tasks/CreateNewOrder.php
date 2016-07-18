<?php

namespace App\Tasks;
use App\Http\Repositories;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\OrderRepository;
use App\Order;
use App\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 7/15/2016
 * Time: 5:38 PM
 */
class CreateNewOrder extends Task
{
    private $order;
    private $cartRepository;
    private $orderRepository;
    private $cart;

    public function __construct()
    {
        $this->cartRepository=new CartRepository();
        $this->orderRepository=new OrderRepository();
    }

    public function handle()
    {
        $this->cart=$this->cartRepository->getCart();
        $this->createOrder();
        $this->addProductsToOrder();

    }


    public function createOrder()
    {
        $params=[
        'user_id'=>Auth::user()->id,
        'placed_on'=> Carbon::now()->toDateString(),
        'delivered_on'=> Carbon::now()->addDay(3)->toDateString(),
            'bill_amount'=>$this->billamount()
        ];
        $this->order=Order::create($params);
        return $this->order;


    }

    public function billamount()
    {
        return '500';
    }

    public function addProductsToOrder()
    {
        $products=$this->cart->products;

        foreach($products as $product) {
            $this->orderRepository->addProductsToOrder($this->order->id, $product->id);
            $this->cartRepository->removeProductsFromCart($product->id, $this->cart->id);
        }
    }

     
}