<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'code'          => rand(1, 150),
        'name'          => $faker->name,
        'description'   => $faker->sentence,
        'width'         => rand(1, 150),
        'length'        => rand(1, 150),
        'outstanding'   => rand(0, 1),
    ];
});
