<?php

namespace App\Listeners;

use App\Events\NewProductCreated;
use App\Jobs\Product\SendEmailToEditorsAboutNewProduct;
use App\Jobs\Product\SendEmailToAdminsAboutNewProduct;
use App\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
//        $this->dispatch(new SendEmailToAdminsAboutNewProduct($event->product));
//        $this->dispatch(new SendEmailToEditorsAboutNewProduct($event->product));

        dispatch(new SendEmailToAdminsAboutNewProduct($event->product));
        dispatch(new SendEmailToEditorsAboutNewProduct($event->product));


    }
}
