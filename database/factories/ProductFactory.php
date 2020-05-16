<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->productName,
        'description' => $faker->text,
        'price' => $faker->randomFloat(null, 0),
    ];
});
