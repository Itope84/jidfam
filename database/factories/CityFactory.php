<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'state' => $faker->state,
        'delivery_rate' => 100000,
    ];
});
