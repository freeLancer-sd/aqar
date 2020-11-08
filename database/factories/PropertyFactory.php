<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {

    return [
        'title' => $faker->name,
        'address' => $faker->word,
        'lat' => $faker->randomDigitNotNull,
        'lng' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'room_number' => $faker->randomDigitNotNull,
        'property_age' => $faker->randomDigitNotNull,
        'furnished' => $faker->randomDigitNotNull,
        'air_conditioner' => $faker->randomDigitNotNull,
        'space' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'note' => $faker->word,
        'property_categorie_id' => $faker->word,
        'user_id' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
