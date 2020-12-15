<?php

use Faker\Generator as Faker;
use App\Models\CouponCode;

$factory->define(App\Models\CouponCode::class, function (Faker $faker) {
    //随机一个类型
    $type = $faker->randomElement(array_keys(CouponCode::$typeMap));
    //根据类型生成对应的折扣
    $value = $type === CouponCode::TYPE_FIXED ? random_int(1,20) : random_int(30,70);

    //最低金额，如果固定金额类型，则最低金额要比优惠金额高0.01
    if ($type === CouponCode::TYPE_FIXED){
        $minAmount = $value + 0.01;
    }else{
        //如果是百分比，则有50%的概率不要最低金额
        if (random_int(1,100)<50){
            $minAmount = 0;
        }else{
            $minAmount = random_int(5,20);
        }
    }

    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        // 'name' => $faker->name,
        'name'       => '这是一条兑换码名称',
        'code'       => CouponCode::findAvailableCode(), // 调用优惠码生成方法
        'type'       => $type,
        'value'      => $value,
        'total'      => 10,
        'used'       => 0,
        'min_amount' => $minAmount,
        'not_before' => null,
        'not_after'  => null,
        'enabled'    => true,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
