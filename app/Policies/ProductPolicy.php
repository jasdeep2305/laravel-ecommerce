<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->level_id < 3;
    }

    public function edit(User $user)
    {
        return $user->level_id < 3;
    }

    public function delete(User $user)
    {
        return $user->level_id == 1;
    }
}
