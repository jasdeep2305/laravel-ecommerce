<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:50
 */

namespace App\Http\Repositories;

use App\Order;
use Carbon\Carbon;
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
     * @return static
     */
    public function addNewOrder($request)
    {
        //dd($request->all());
        $user_id=Auth::user()->id;
        $placed_on= Carbon::now()->toDateString();
        $delivered_on= Carbon::now()->addDay(3)->toDateString();
        $bill_amount= $request['totalprice'];
       // dd($bill_amount);
        $order=Order::create(['user_id'=>$user_id,'placed_on'=>$placed_on,'delivered_on'=>$delivered_on,'bill_amount'=>$bill_amount]);
        //dd($order);
        return $order;


    }
   
}
