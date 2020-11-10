<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
//use Faker\Factory as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// 头像假数据
$avatars = [
    'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',
];


$factory->define(User::class, function (Faker $faker) use ($avatars) {

    //$faker = Faker::create('zh_CN');
    //$date_time = $faker->date . ' ' . $faker->time;

    // 随机取一年以内的时间
    $updated_at = $faker->dateTimeThisYear();

    // 为创建时间传参，意为最大不超过 $updated_at，因为创建时间需永远比更改时间要早
    $created_at = $faker->dateTimeThisYear($updated_at);

    return [
        'name' => $faker->name,
        'avatar' => $faker->randomElement($avatars),
        'introduction' => $faker->catchPhrase(),
        //'email' => $faker->unique()->safeEmail,
        'email' => $faker->email(),
        'email_verified_at' => now(),
        'password' => '$2y$10$pwuroIC1qQyYG1EJK9JHNeeAMrsP/Ai/j8qcZ0KPj4yWCToA6rrVG', // 123123123
        'remember_token' => Str::random(10),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
