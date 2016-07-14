<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:51
 */

namespace App\Http\Repositories;



use App\OrderProduct;
use Illuminate\Http\Request;

class OrderProductRepository
{

    public function getProductsForOrder($id)
    {
        return OrderProduct::where('order_id',$id)->get();
    }

    public function addProductToYourOrders($request,$new_order){

        $params = $this->params($request, $new_order);
        $newProduct= OrderProduct::create($params);
        return $newProduct;


    }

    private function params($request, $new_order)
    {

        return [
            'product_id' => $request['product_id'],
            'order_id' => $new_order->id,

        ];

        // dd($params);
    }

}