<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'nombre' =>  substr($faker->sentence(3), 0, -1),
      'description' => $faker->sentence(10),
      'long_description'=> $faker->text,
      'price' => $faker->randomFloat(2, 5, 150),

      'category_id' => $faker->numberBetween(1, 5)
    ];
});
