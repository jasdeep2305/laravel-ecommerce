<?php

namespace App\Tasks;
use App\Events\NewOrderCreated;
use App\Http\Repositories;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\OrderRepository;
use App\Order;
use App\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

/*
 * This will call the NewOrderCreated Event
 */
    public function handle()
    {
        DB::transaction(function ()
        {
            $this->cart=$this->cartRepository->getCart();
            $this->createOrder();
            $this->addProductsToOrder();
        });
        event(new NewOrderCreated($this->order));

    }


    /**
     * Create a new Order
     * @return static
     */
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

    /**
     * Set Bill Amount to 500
     * @return string
     */
    public function billamount()
    {
        return '500';
    }

    /**
     *Add Products to Order Created
     */
    public function addProductsToOrder()
    {
        $products=$this->cart->products;

        foreach($products as $product) {
            $this->orderRepository->addProductsToOrder($this->order->id, $product->id);
            $this->cartRepository->removeProduct($product->id, $this->cart->id);
        }
    }

     
}