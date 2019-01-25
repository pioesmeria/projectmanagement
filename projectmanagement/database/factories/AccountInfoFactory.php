<?php

use Faker\Generator as Faker;

$factory->define(App\AccountInfo::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstname,
        'lastName' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
    ];
});
