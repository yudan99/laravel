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
        'user_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
        'sh_time' => $sh_at,
        'sub_time' => $sub_at,
        'file_verify' => '1',
        'file_status' => 'XXX',
        'file_type' => 'pptx',
        'file_introduction' => '<p>这是一条自动生成的测试内容</p><p><img src="/uploads/images/articles/202012/01/bbef467e314fadcf9a36c1919c1b0ac0.jpg"></p>',
        'fiels' => 'test',
        'tags' => 'test',
        'video_preview' => 'test',
        'pic_preview' => 'test',
        'tem_path' => 'http://homestead.test/uploads/file/tem_path/202011/26/admin_1606405450_awozFhdSVl.pptx',
        'st_path' => '2.5D简约风年终总结PPT模板.pptx',
        'ini_price' => $faker->randomFloat(2, 1.8, 3.8),
        'cur_price' => $faker->randomFloat(2, 5.8, 9.8),
        'read_count' => $faker->randomNumber(3,true),
        'read_times' => $faker->randomNumber(4,true),
        'collect_count' => $faker->randomNumber(2,true),
        'forward_count' => $faker->randomNumber(2,true),
        'pay_count' => $faker->randomNumber(2,true),
        'down_count' => $faker->randomNumber(2,true),
        'down_times' => $faker->randomNumber(2,true),
        'email_count' => $faker->randomNumber(2,true),
        'email_times' => $faker->randomNumber(2,true),

        'order' => $faker->randomNumber(6,false),
        'excerpt' => $faker->text(200),
        'slug' => $faker->words(10, true),

        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
