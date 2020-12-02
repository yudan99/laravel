<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();
    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'course_id' => $faker->randomElement([1, 2, 3]),
        'edition_version' => $faker->randomElement([1.0, 1.3, 1.8, 2.0, 2.2, 2.6, 3.0, 3.4]),
        'edition_introduction' => $faker->catchPhrase(),

        'is_open' => '1',
        'is_newest' => '0',

        'care' => $faker->catchPhrase(),
        'order' => $faker->randomNumber(6,false),
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];
});
