<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:50
 */

namespace App\Http\Repositories;

use App\Contracts\Repository;
use App\Exceptions\OrderNotFound;
use App\Order;
use App\OrderProduct;
use App\Tasks\CreateNewOrder;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements Repository
{

    /**
     * Get all orders of logged in user
     * @return mixed
     */
    public function all()
    {
        return Order::where('user_id', Auth::user()->id)->paginate(5);
    }

    /**
     * Finding an order with the $id.. used by 'show' method of OrderController
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $order=Order::find($id);
        if(!$order)
            throw new OrderNotFound('Order does not exist');
        return $order;
    }


    public function findOrderProduct($id)
    {
        return OrderProduct::where('order_id', $id)->get();
    }


    /**
     * Add product to a order, used by task 'CreateNewOrder'
     * @param $order_id
     * @param $product_id
     * @return static
     */
    public function addProduct($order_id, $product_id)
    {
        $newProduct = OrderProduct::create(['order_id' => $order_id, 'product_id' => $product_id]);
        return $newProduct;

    }

    /**
     * Create a new order for the current logged in user.  Repository Interface method implemented
     *
     */
    public function create()
    {

        $task = new CreateNewOrder();
        $task->handle();

    }


    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
