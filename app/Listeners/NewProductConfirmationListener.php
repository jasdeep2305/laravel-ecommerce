<?php

namespace App\Listeners;

use App\Events\NewProductCreated;
use App\Jobs\Product\SendEmailToAdminsAboutNewProduct;
use App\Jobs\Product\SendEmailToEditorsAboutNewProduct;

class NewProductConfirmationListener
{

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
     * @param  NewProductCreated  $event
     * @return void
     */
    public function handle(NewProductCreated $event)
    {
        dispatch(new SendEmailToAdminsAboutNewProduct($event->product));
        dispatch(new SendEmailToEditorsAboutNewProduct($event->product));
    }
}
