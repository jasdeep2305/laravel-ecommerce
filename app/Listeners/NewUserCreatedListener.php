<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use App\Jobs\WelcomeUserMail;

class NewUserCreatedListener
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
     * @param  NewUserCreated  $event
     * @return void
     */
    public function handle(NewUserCreated $event)
    {
        //dd('In listener');
        dispatch(new WelcomeUserMail($event->user));

    }
}
