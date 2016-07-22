<?php

namespace App\Providers;

use App\Order;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Product'=>'App\Policies\ProductPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
       // 'App\Product' => 'App\Policies\ProductPolicy'
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        $gate->define('view-order',function($user,Order $order){
            return $user->id==$order->user_id;
        });
//
//        $gate->define('create-product',function($user, Product $product){
//           //dd($product);
//            return false;
//        });
//
//        $gate->define('update-product',function($user, Order $product){
//            //dd($product);
//            dd($user);
//            return true;
//        });

    }
}
