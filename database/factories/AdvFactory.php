<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Adv;
use Faker\Generator as Faker;

$factory->define(Adv::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'address' => $faker->word,
        'lat' => $faker->randomDigitNotNull,
        'lng' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'room_number' => $faker->randomDigitNotNull,
        'bath_number' => $faker->randomDigitNotNull,
        'hall_number' => $faker->randomDigitNotNull,
        'property_age' => $faker->randomDigitNotNull,
        'air_conditioner' => $faker->randomDigitNotNull,
        'space' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'note' => $faker->text,
        'land_number' => $faker->word,
        'destination' => $faker->word,
        'advertiser_status' => $faker->word,
        'floor' => $faker->word,
        'the_number_stores' => $faker->word,
        'the_number_apartments' => $faker->word,
        'street_area' => $faker->word,
        'the_purpose' => $faker->word,
        'wells' => $faker->word,
        'rental_type' => $faker->word,
        'rental_data' => $faker->word,
        'property_type' => $faker->word,
        'car_entrance' => $faker->word,
        'deluxe' => $faker->word,
        'kitchen' => $faker->word,
        'swimming_pool' => $faker->word,
        'driver_room' => $faker->word,
        'maids_room' => $faker->word,
        'elevator' => $faker->word,
        'furnished' => $faker->word,
        'cellar' => $faker->word,
        'courtyard' => $faker->word,
        'extension' => $faker->word,
        'property_categorie_id' => $faker->word,
        'user_id' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'city_id' => $faker->word,
        'district_id' => $faker->word,
        'status_mobile' => $faker->word
    ];
});
