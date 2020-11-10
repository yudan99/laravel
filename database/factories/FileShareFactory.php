<?php

use Faker\Generator as Faker;

$factory->define(App\Models\FileShare::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    //城市
    $cites = $faker->address();
    //电话
    $phone = $faker->phoneNumber();
    //公司
    $company = $faker->companySuffix();
    //短语
    $phrase = $faker->catchPhrase();


    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();

    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    // 为提交文件时间传参
    $sh_at = $faker->dateTimeThisMonth();

    // 为提交文件时间传参
    $sub_at = $faker->dateTimeThisMonth();

    return [
        'sh_user_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
        'sh_time' => $sh_at,
        'sub_time' => $sub_at,
        'file_verify' => '1',
        'file_status' => 'XXX',
        'file_type' => 'pptx',
        'file_introduction' => $cites.'的'.$company.'电话'.$phone.'说了'.$phrase.'带上'.$sentence,
        'fiels' => 'test',
        'tags' => 'test',
        'video_preview' => 'test',
        'pic_preview' => 'test',
        'tem_path' => 'test',
        'st_path' => 'test',
        'ini_price' => $faker->randomElement([2, 3, 4, 5]),
        'cur_price' => $faker->randomElement([5.6, 6.8, 7.2, 7.6]),
        'read_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'read_times' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'collect_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'forward_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'pay_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'down_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'down_times' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'email_count' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        'email_times' => $faker->randomElement([11, 23, 35, 47, 52, 6, 3, 87, 13, 143]),
        //'order' => '0',
        'excerpt' => $cites.'的'.$company,
        'slug' => $faker->text(),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
