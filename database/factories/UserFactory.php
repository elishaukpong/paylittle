<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Models\States;

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
    $status = [1,0];
    $gender = ['male','female', 'others'];
    $index = array_rand($status);
    $indexx = array_rand($gender);
    $state = States::all()->random();

    $lga = $state->lga()->get()->random()->id;

    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'slug' => str_slug($faker->name) . rand(1000,9000),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'dob' =>   Carbon::now()->subMonth(rand(19,40)),
        'gender' => $gender[$indexx],
        'occupation' => $faker->company,
        'address' => $faker->address,
        'state_id' => $state->id,
        'localgovernmentarea_id' => $lga,
        'details' => $faker->text(250),
        'is_admin' => $status[$index],
        'email_verified_at' => Carbon::now(),
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
    ];
});

