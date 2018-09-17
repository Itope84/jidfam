<?php

use Faker\Generator as Faker;

$factory->define(App\Consultancy::class, function (Faker $faker) {
	$isuser = [null, [rand(1, 10)]];
    return [
        'user_id' => $isuser[array_rand($isuser)],
        'description' => $faker->optional()->text,
        'passcode' => $faker->unique->realText(15),
    ];
});
