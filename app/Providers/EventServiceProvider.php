<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        
        'App\Events\NewOrderCreated' =>
            ['App\Listeners\NewOrderCreatedListener'],
        'App\Events\NewUserCreated' =>
            ['App\Listeners\NewUserCreatedListener'],
        'App\Events\ProductUpdated' => [
            'App\Listeners\ProductUpdatedConfirmationListener'],
        'App\Events\NewProductCreated' => [
            'App\Listeners\NewProductConfirmationListener']
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
