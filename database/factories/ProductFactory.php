<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	$products = ['paracetamol', 'M&B', 'panadol', 'septrin', 'loratidin', 'ampliclux', 'lumartem', 'ampicillin', 'aspirin', 'gascol', 'vitamin b complex', 'gentamycin'];
	$filePath = public_path('storage/images');
	if(!File::exists($filePath)){
        File::makeDirectory($filePath);  //follow the declaration to see the complete signature
    }

    return [
        'name' => $products[array_rand($products)],
        'description' => $faker->realText,
        'category_id' => rand(1, 4),
        'price' => sprintf("%.2f", rand(20000, 1000000)),
        'unit' => 'carton',
        'units' => rand(0, 100),
        'image' => $faker->imageUrl(400,300, 'food') 
    ];
});
