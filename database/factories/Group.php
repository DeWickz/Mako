<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Group::class, function (Faker $faker) {
    return [
        'product_id' => $faker ->numberBetween(1,9),
        'group_product_id' => $faker ->numberBetween(1,9),
        'group_name' => $faker ->name,
    ];
});
