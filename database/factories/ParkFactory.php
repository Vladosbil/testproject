<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Park;
use Faker\Generator as Faker;

$factory->define(Park::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'schedule' => $faker->randomElement(['24/7', '09:00 - 18:00', '10:00 - 20:00', '08:00 - 17:00', '13:00 - 22:00'])
    ];
});
