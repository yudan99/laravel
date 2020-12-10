<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        $order_items = factory(OrderItem::class)->times(50)->make()->each(function ($order_item, $index) {
            if ($index == 0) {
                // $order_item->field = 'value';
            }
        });

        OrderItem::insert($order_items->toArray());
    }

}

