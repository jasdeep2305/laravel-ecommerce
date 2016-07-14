<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:50
 */

namespace App\Http\Repositories;

use App\Order;
use Illuminate\Support\Facades\Auth;

//use App\OrderProduct;


class OrderRepository
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

//    public function getProductID()
//    {
//        $order_id=$this->getAllOrders();
//        return OrderProduct::where('order_id',$order_id)->get();
//    }

    public function getProductsForOrder($id)
    {
        return Order::where('id',$id)->get();
    }

    public function find($id)
    {
        return Order::find($id);
    }

    public function addNewOrder()
    {
        $user_id=Auth::user()->id;
        $order=Order::create(['user_id'=>$user_id]);
        return $order;


    }
   
}
