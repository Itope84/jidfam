<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
	$isuser = [null, rand(1, 10)];
    return [
        'is_paid' => false,
        'user_id' => $isuser[array_rand($isuser)],
        'email' => $faker->optional()->safeEmail,
        'phone' => $faker->phoneNumber,
        'unique_id' => 'J18-0000'.rand(1, 10),
        'address' => $faker->optional()->address,
        'city_id' => rand(1, 10)
    ];
});
