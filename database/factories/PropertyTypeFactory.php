<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PropertyType;
use Faker\Generator as Faker;

$factory->define(PropertyType::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
