<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('orders/confirmation','OrderController@confirmation');
Route::get('/', 'ProductController@index');


Route::get('/viewcart', 'CartController@show');

Route::resource('cart','CartController');
Route::resource('cartproducts','CartProductController');
Route::resource('products', 'ProductController');
Route::resource('products/{product_id}/reviews', 'ProductReviewsController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('user','UserController');

Route::resource('orders','OrderController');
Route::get('orders/confirmation',function(){
   return  view('order.confirmation');
});