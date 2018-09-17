<?php

use Faker\Generator as Faker;

$factory->define(App\OrderItem::class, function (Faker $faker) {
    return [
        'order_id' => rand(1, 10),
        'product_id' => rand(1, 10),
        'qty' => rand(3, 50)
    ];
});
