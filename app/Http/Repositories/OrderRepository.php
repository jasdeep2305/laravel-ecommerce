<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:50
 */

namespace App\Http\Repositories;

use App\Contracts\Repository;
use App\Order;
use App\OrderProduct;
use App\Tasks\CreateNewOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements Repository
{


    /**
     * Get all orders of logged in user
     * 
     * @return mixed
     */
    public function getAllOrders()
    {
        return Order::where('user_id', Auth::user()->id)->get();
    }



    /**
     * @param $id
     * @return mixed
     */

    public function getProductsForOrder($id)
    {
        return Order::where('id',$id)->get();
    }



    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Order::find($id);
    }




    /**
     * Add a new order
     * @param $request
     * @return static
     */
    public function addNewOrder($request)
    {
        $user_id=Auth::user()->id;
        $placed_on= Carbon::now()->toDateString();
        $delivered_on= Carbon::now()->addDay(3)->toDateString();
        $bill_amount= $request['totalprice'];
        $order=Order::create(['user_id'=>$user_id,'placed_on'=>$placed_on,'delivered_on'=>$delivered_on,'bill_amount'=>$bill_amount]);
        return $order;
    }



    /**
     * Add products to a order
     * @param $order_id
     * @param $product_id
     * @return static
     */
    public function addProductsToOrder($order_id, $product_id)
    {
        $newProduct= OrderProduct::create(['order_id'=>$order_id,'product_id'=>$product_id]);
        return $newProduct;

    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
        $task = new CreateNewOrder();
        $task->handle();
        
    }

    public function update($request,$id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
