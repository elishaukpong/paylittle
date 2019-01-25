<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

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
    $gender = ['male','female', 'others'];
    $index = array_rand($status);
    $indexx = array_rand($gender);

    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'dob' =>   Carbon::now()->subMonth(rand(19,40)),
        'gender' => $gender[$indexx],
        // 'avatar' => $faker->image('storage/app/public/avatars/users',400,400, null,false),
        'address' => $faker->address,
        'details' => $faker->text(250),
        'is_admin' => $status[$index],
        'email_verified_at' => Carbon::now(),
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
    ];
});
