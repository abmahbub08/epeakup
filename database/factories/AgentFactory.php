<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Agent::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode,
        'country_id' => 1,
        'active' => 1,
        'gender' => "Male",
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'avatar' => $faker->imageUrl($width = 200, $height = 220),
        'idcard' => $faker->imageUrl($width = 200, $height = 220),
        'remember_token' => Str::random(10)
    ];
});
