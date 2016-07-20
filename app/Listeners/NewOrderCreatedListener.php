<?php

namespace App\Listeners;

use App\Events\NewOrderCreated;
use App\Jobs\Orders\EmailSellerForNewOrder;
use App\Jobs\Orders\EmailUserOrderConfirmation;

class NewOrderCreatedListener
{
    /**
     * @var NewOrderCreated
     */
    private $event;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  NewOrderCreated $event
     * @return void
     */
    public function handle(NewOrderCreated $event)
    {
        dispatch(new EmailSellerForNewOrder($event->order));
        dispatch(new EmailUserOrderConfirmation($event->order));


    }
}
