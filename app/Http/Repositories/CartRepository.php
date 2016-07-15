<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:46
 */

namespace App\Http\Repositories;

use App\Cart;
use App\CartProduct;
use Illuminate\Support\Facades\Auth;
Use App\User;

class CartRepository 
{
    /**
     * Create a cart if doesn't exist for a user
     * Else return cart
     * @param $request
     * @return cart
     */
    public function createCart()
   {

       $user_id = null;

       if(Auth::check())
           $user_id = Auth::user()->id;
//       else
//           return redirect('\login');

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

    /**
     * Get the current cart
     * @return static
     */
    public function getCart()
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

    public function removeProductsFromCart($product_id,$cart_id)
    {
        return CartProduct::where('product_id',$product_id)->where('cart_id',$cart_id)->delete();
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