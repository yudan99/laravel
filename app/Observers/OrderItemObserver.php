<?php

namespace App\Observers;

use App\Models\OrderItem;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OrderItemObserver
{
    public function creating(OrderItem $order_item)
    {
        //
    }

    public function updating(OrderItem $order_item)
    {
        //
    }
}