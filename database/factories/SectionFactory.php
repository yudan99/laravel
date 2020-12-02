<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Section::class, function (Faker $faker) {
    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'chapter_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),

        'section_name' => $faker->numerify('小节测试：#####'),
        'section_introduce' => $faker->catchPhrase(),
        'section_detail' => $faker->paragraphs(10, true),

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
        'slug' => $faker->$faker->words(10, true),
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];
});
