<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EmailSubscription::class, function (Faker $faker) {
    return [
        'emails' => $faker->companyEmail,
    ];
});
