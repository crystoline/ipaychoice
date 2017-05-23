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
$factory->define(App\Models\Clients\Service::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => random_int(4000, 19000),
        'description' => $faker->sentence,
    ];
});
