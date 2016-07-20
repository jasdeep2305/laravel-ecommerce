<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use App\Jobs\EmailUserForRegistration;

class NewUserCreatedListener
{
    /**
     * @var NewUserCreated
     */
    private $event;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NewUserCreated $event)
    {
        //
        $this->event = $event;
    }

    /**
     * Handle the event.
     *
     * @param  NewUserCreated  $event
     * @return void
     */
    public function handle()
    {
        dispatch(new EmailUserForRegistration($this->event->user));
    }
}
