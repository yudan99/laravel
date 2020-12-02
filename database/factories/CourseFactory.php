<?php

use Faker\Generator as Faker;

// 封面假数据
$covers = [
    'https://cdn.learnku.com/uploads/images/201810/26/1/MYg2QNQfss.png',
    'https://cdn.learnku.com/uploads/images/201810/26/1/mj8qSkmZzw.png',
    'https://cdn.learnku.com/uploads/images/201810/26/1/lto59p5rEM.png',
];

$factory->define(App\Models\Course::class, function (Faker $faker) use ($covers) {

    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'course_name' => $faker->numerify('凑学教程测试：#####'),
        'fiels' => '[1,2,3,4,5]',
        'tags' => '[1,2,3,4,5]',
        'cover' => $faker->randomElement($covers),
        'author' => $faker->name,
        'course_introduce' => $faker->catchPhrase(),

        'ini_price' => $faker->randomElement([19.8, 29.8, 39.8, 69.8]),
        'cur_price' => $faker->randomElement([22.8, 36.8, 55.8, 78.8]),

        'is_open' => '1',

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
