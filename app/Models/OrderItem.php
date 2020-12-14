<?php

namespace App\Models;
use DateTimeInterface;

class OrderItem extends Model
{
    const PRODUCT_FILE = 'file_share';
    const PRODUCT_COURSE = 'course';
    const PRODUCT_MEM = 'mem';
    const PRODUCT = 'null';

    public static $productTypeMap = [
        self::PRODUCT_FILE => '文件',
        self::PRODUCT_COURSE => '教程',
        self::PRODUCT_MEM => '会员',
        self::PRODUCT => '空',
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

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('m-d H:i:s');
    }

//    public function mem()
//    {
//        return $this->belongsTo(Mem::class);
//    }

}
