<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:51
 */

namespace App\Http\Repositories;


use App\OrderProduct;

class OrderProductRepository
{

    public function getProductsForOrder($id)
    {
        return OrderProduct::where('order_id',$id)->get();
    }

}