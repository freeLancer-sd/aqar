<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'image_url' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
