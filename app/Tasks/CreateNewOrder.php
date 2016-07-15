<?php

namespace App\Tasks;

use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\CartRepository;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreateNewOrder extends Task
{

    private $cartRepository;
    private $orderRepository;
    private $cart;
    private $order;

    /**
     *
     * CreateNewOrder constructor.
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->orderRepository = new OrderRepository();

    }

    public function handle()
    {
        $this->cart = $this->cartRepository->getCart();

        $this->createOrder();

        $this->addProductsToOrder();

    }

    private function createOrder()
    {
        $params = [
            'user_id' => Auth::user()->id,
            'placed_on' => Carbon::now()->toDateString(),
            'delivered_on' => Carbon::now()->addDay(3)->toDateString(),
            'bill_amount' => $this->billAmount()
        ];
        return $this->order = Order::create($params);

    }

    /**
     * @return string
     */
    private function addProductsToOrder()
    {
        $products = $this->cart->products;

        foreach ($products as $product)
        {
            $this->orderRepository->addProductsToOrder($this->order->id, $product->id);
            $this->cartRepository->removeProductsFromCart($product->id, $this->cart->id);
        }
        return ('');
    }

    private function billAmount()
    {
        return '800';
    }
}