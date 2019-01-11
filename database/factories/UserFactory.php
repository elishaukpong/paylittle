<?php

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
$factory->define(App\User::class, function (Faker $faker) {
    $status = ['admin','null'];
    $index = array_rand($status);

    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'gender' => 'male',
        'avatar' => $faker->image('storage/app/public/avatars/users',400,400, null,false),
        'address' => $faker->address,
        'verification_string' => $faker->randomNumber(),
        'is_admin' => $status[$index],
        'email_verified_at' => now(),
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
    ];
});
