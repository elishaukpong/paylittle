<?php

use Faker\Generator as Faker;
use App\Models\RepaymentPlan;

$factory->define(RepaymentPlan::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid(),
        'timeline' => '',
    ];
});
