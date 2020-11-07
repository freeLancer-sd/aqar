<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PropertyCategory;
use Faker\Generator as Faker;

$factory->define(PropertyCategory::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});
