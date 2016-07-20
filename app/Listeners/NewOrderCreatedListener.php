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
    public function __construct(NewOrderCreated $event)
    {

        $this->event = $event;
    }

    /**
     * Handle the event.
     *
     * @param  NewOrderCreated  $event
     * @return void
     */
    public function handle()
    {
       dispatch(new EmailSellerForNewOrder($this->event->order));
        dispatch(new EmailUserOrderConfirmation($this->event->order));


        
    }
}
