<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Chapter::class, function (Faker $faker) {
    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'course_id' => $faker->randomElement([1, 2, 3]),
        'edition_id' => $faker->numberBetween(1, 9),

        'chapter_name' => $faker->numerify('这是章节标题#####'),
        'chapter_introduce' => $faker->catchPhrase(),

        'is_open' => '1',

        'care' => $faker->catchPhrase(),
        'order' => $faker->randomNumber(6,false),
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];
});
