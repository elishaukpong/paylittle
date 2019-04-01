<?php

use Faker\Generator as Faker;
use App\Models\Project;
$factory->define(Project::class, function (Faker $faker) {
    $amount = $faker->numberBetween(400000, 1000000);
    $returns = $amount  + ($amount * 0.35);
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'amount' => $amount,
        'location' => $faker->address,
        'details' => $faker->text(200),
    ];
});
