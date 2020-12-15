<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Support\Str;


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

    //访问
    protected $appends = ['description'];

    //自动生成描述,访问器
    public function getDescriptionAttribute(){
        $str = '';

        if ($this->min_amount > 0 ){
            //$str = '满'.$this->min_amount;
            $str = '满'.str_replace('.00', '', $this->min_amount);
        }
        if ($this->type === self::TYPE_PERCENT) {
            //return $str.'优惠'.$this->value.'%';
            return $str.'优惠'.str_replace('.00', '', $this->value);
        }
        //return $str.'减'.$this->value;
        return $str.'减'.str_replace('.00', '', $this->value);
    }

    //让后台时间显示正常一点
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }

    //随机生成兑换码
    public static function findAvailableCode($length = 4){
        do{
            //生成指定长度的随机字符串，并转大写
            $code = strtoupper(Str::random($length));
            //如果生成的已存在则循环
        }while(self::query()->where('code',$code)->exists());

        return $code;
    }


}
