<?php

namespace App\Models;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_type', 'file_share_id', 'course_id', 'mem_id', 'amount', 'price'];
}
