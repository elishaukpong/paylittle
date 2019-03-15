<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Guarantor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});
