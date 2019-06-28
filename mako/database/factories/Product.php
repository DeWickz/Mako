<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [

            'group_id' => 1,
            'product_name' => $faker->name,
            'product_code' => $faker->numerify(),
            'product_price' => $faker->NumberBetween(10,20),
            'product_detail' => Str::random(10),
            'product_createdBy' => $faker->name,
            'product_brand' => $faker->name,
            'product_group' => 1,
            'product_warranty' => 1234,
            'product_model' => $faker->name,
            'product_images' => $faker->randomDigit,
    ];
});
