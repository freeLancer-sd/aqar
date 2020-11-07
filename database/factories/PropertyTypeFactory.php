<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PropertyType;
use Faker\Generator as Faker;

$factory->define(PropertyType::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});
