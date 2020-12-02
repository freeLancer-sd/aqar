<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use Faker\Generator as Faker;

$factory->define(District::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'number' => $faker->word,
        'city_id' => $faker->word
    ];
});
