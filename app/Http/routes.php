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

    Route::get('/cart','CartController@index');
    Route::post('/cart','CartController@addProduct');
    Route::put('/cart','CartController@updateProductQuantity');
    Route::delete('/cart','CartController@removeProduct');


    Route::get('/', 'ProductController@index');


    Route::get('/viewcart', 'CartController@show');

//    Route::resource('cartproducts', 'CartProductController');
    Route::resource('products', 'ProductController');
    Route::resource('products/{product_id}/reviews', 'ProductReviewsController');


    Route::get('/home', 'HomeController@index');
    Route::resource('user', 'UserController');

    Route::resource('orders', 'OrderController');
    Route::post('orders/confirmation', 'OrderController@confirmation');
    Route::post('/payment/{order_id}', 'OrderController@payment');


    Route::auth();
