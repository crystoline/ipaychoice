<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Configuration::class, function (Faker\Generator $faker) {
    return [
        'subdomain' => $faker->word,
        'domain'  => $faker->word,
        'database'  => $faker->word
    ];
});
