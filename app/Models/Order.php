<?php

namespace App\Models;

class Order extends Model
{
    protected $fillable = ['order_no', 'user_id', 'total_amount', 'deal_amount', 'deal_type', 'paid_at', 'paid_type', 'paid_no', 'refund_status', 'refund_no', 'is_closed', 'is_open', 'remake', 'extra'];
}
