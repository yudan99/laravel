<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OrderItem;

class OrderItemPolicy extends Policy
{
    public function update(User $user, OrderItem $order_item)
    {
        // return $order_item->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, OrderItem $order_item)
    {
        return true;
    }
}
