<?php

use Faker\Generator as Faker;
use App\Models\Duration;

$factory->define(Duration::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid(),
        'timeline' => '',
    ];
});
