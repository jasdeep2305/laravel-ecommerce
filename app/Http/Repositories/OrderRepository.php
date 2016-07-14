<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:50
 */

namespace App\Http\Repositories;

use App\Order;
//use App\OrderProduct;
use Illuminate\Support\Facades\Auth;


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
}