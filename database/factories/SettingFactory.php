<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'version' => $faker->word,
        'version_last' => $faker->word,
        'primary_color' => $faker->word,
        'secondary_color' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'logo' => $faker->word,
        'mobile_first' => $faker->word,
        'mobile_secondary' => $faker->word,
        'whats_app_first' => $faker->word,
        'whats_app_secondary' => $faker->word,
        'fb_page' => $faker->word,
        'tw_page' => $faker->word,
        'snp_page' => $faker->word,
        'ins_page' => $faker->word
    ];
});
