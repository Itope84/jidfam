<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => rand(1, 500),
        'image' => $faker->imageUrl(400,300, 'food')
    ];
});
