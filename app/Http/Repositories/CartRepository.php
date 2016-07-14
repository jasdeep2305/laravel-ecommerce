<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:46
 */

namespace App\Http\Repositories;

use App\Cart;

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

       $user_id = null;

       if(Auth::check())
           $user_id = Auth::user()->id;

       if($cart = Cart::where('user_id', $user_id)->first())
       {
           return $cart;
       }

       else
       {
           $cart= Cart::create(['user_id'=> $user_id]);
           return $cart;
       }

   }

    public function store()
    {
        
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