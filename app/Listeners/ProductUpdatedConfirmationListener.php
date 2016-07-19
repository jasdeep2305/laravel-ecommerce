<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Jobs\Product\SendEmailToAdminsAboutProductUpdated;
use App\Jobs\Product\SendEmailToEditorsAboutProductUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductUpdatedConfirmationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductUpdated  $event
     * @return void
     */
    public function handle(ProductUpdated $event)
    {
        dispatch(new SendEmailToAdminsAboutProductUpdated($event->product));
        dispatch(new SendEmailToEditorsAboutProductUpdated($event->product));
    }
}
