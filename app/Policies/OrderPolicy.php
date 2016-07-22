<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user,Order $order){
        return $user->id==$order->user_id;
    }

    public function update(User $user, Order $order)
    {
        return false;
    }
}
