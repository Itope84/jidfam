<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'banner' => $faker->imageUrl(400,300, 'food'),
        'default_image' => $faker->imageUrl(400,300, 'food')
    ];
});
