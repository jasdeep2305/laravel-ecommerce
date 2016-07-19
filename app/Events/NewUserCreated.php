<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class NewUserCreated extends Event
{
    use SerializesModels;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
