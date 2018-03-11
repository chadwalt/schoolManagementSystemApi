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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        "id" => $faker->numberBetween($min = 1, $max = 9000),
        "first_name" => $faker->first_name,
        "last_name" => $faker->last_name,
        "username" => $faker->username,
        "email" => $faker->email,
        "role" => "admin",
        "profile_pic" => $faker->profile_pic
    ];
});
