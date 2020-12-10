<?php

namespace App\Models;

class OrderItem extends Model
{
    const PRODUCT_FILE = 'file_share';
    const PRODUCT_COURSE = 'course';
    const PRODUCT_MEM = 'mem';

    public static $productTypeMap = [
        self::PRODUCT_FILE => '文件',
        self::PRODUCT_COURSE => '教程',
        self::PRODUCT_MEM => '会员',
    ];

    protected $fillable = ['order_id', 'product_type', 'file_share_id', 'course_id', 'mem_id', 'amount', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function fileShare()
    {
        return $this->belongsTo(FileShare::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

//    public function mem()
//    {
//        return $this->belongsTo(Mem::class);
//    }

}
