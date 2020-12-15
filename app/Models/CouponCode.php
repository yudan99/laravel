<?php

namespace App\Models;

use DateTimeInterface;


class CouponCode extends Model
{
    //兑换码类型
    const TYPE_FIXED = 'fixed';
    const TYPE_PERCENT = 'percent';

    public static $typeMap = [
        self::TYPE_FIXED => '固定金额',
        self::TYPE_PERCENT => '比例',
    ];


    protected $fillable = ['name', 'code', 'type', 'value', 'total', 'used', 'min_amount', 'not_before', 'not_after', 'enabled'];

    protected $casts = ['enabled' => 'boolean'];

    protected $dates = ['not_before', 'not_after'];

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('m-d H:i:s');
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }


}
