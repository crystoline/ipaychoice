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
$factory->define(App\Models\Clients\Telephone::class, function (Faker\Generator $faker) {

    return [
        'telephone' =>random_int(600000030, 900000000),
        'user_type' => 'App\Models\Clients\Customer'
    ];
});
