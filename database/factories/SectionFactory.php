<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Section::class, function (Faker $faker) {
    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'chapter_id' => $faker->numberBetween(1, 27),

        'section_name' => $faker->numerify('这是小节标题#####'),
        'section_introduce' => $faker->catchPhrase(),
        'section_detail' => '<p>这是一条自动生成的测试内容</p><p><img src="/uploads/images/articles/202012/01/bbef467e314fadcf9a36c1919c1b0ac0.jpg"></p><p>这是一条自动生成的测试内容</p><p><img src="/uploads/images/articles/202012/01/bbef467e314fadcf9a36c1919c1b0ac0.jpg"></p><p>这是一条自动生成的测试内容</p><p><img src="/uploads/images/articles/202012/01/bbef467e314fadcf9a36c1919c1b0ac0.jpg"></p>',

        'is_open' => '1',
        'is_charge' => '0',

        'read_count' => $faker->randomNumber(3,true),
        'read_times' => $faker->randomNumber(4,true),
        'collect_count' => $faker->randomNumber(2,true),
        'forward_count' => $faker->randomNumber(2,true),
        'pay_count' => $faker->randomNumber(2,true),
        'clock_count' => $faker->randomNumber(2,true),
        'comment_count' => $faker->randomNumber(2,true),
        'problem_count' => $faker->randomNumber(2,true),
        'reply_count' => $faker->randomNumber(3,true),

        'care' => $faker->catchPhrase(),
        'order' => $faker->randomNumber(6,false),
        'excerpt' => $faker->text(200),
        'slug' => $faker->words(10, true),
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];
});
