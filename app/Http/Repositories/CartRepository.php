<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:46
 */

namespace App\Http\Repositories;

use app\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CartRepository 
{
    /**
     * Create a cart if doesn't exist for a user
     * @param $request
     * @return cart
     */
    public function createCart()
   {

       $params = [
           //'user_id' => Auth::user()->id
           'user_id' => '1'
       ];

       if($cart = Cart::where('user_id', $params)->first())
       {
           return $cart;
       }

       else
       {
           $cart= Cart::create($params);
           return $cart;
       }

   }

    /**
     * 
     * @param $id
     * @return Cart
     */
//    public function viewCart()
//    {
//        $params = [
//
//            'user_id' => '1'
//        ];
//
//
//        if($cart = Cart::where('user_id',1)->first())
//        {
//            return $cart;
//        }
//
//        else
//        {
//            $cart= Cart::create($params);
//            return $cart;
//        }
//
//    }


}