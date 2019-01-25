<?php

use Faker\Generator as Faker;
use App\Models\Project;
$factory->define(Project::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'amount' => $faker->numberBetween(400000, 1000000),
        'address' => $faker->address,
        'location' => $faker->address,
        'details' => $faker->text(200),
    ];
});
