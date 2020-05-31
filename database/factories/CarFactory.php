<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use App\Models\Park;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'license_plate' => $faker->randomElement(['BK', 'AI', 'AA', 'AM', 'CB']).$faker->numerify('####').$faker->randomElement(['CK', 'CA', 'CB', 'BK', 'AI', 'AA', 'AM']),
        'driver_name' => $faker->name,
        'owner_id' => rand(1, 100) <= 10 ? 2 : null,
    ];
});

$factory->afterCreating(Car::class, function (Car $car, Faker $faker) {
    static $count;
    if (!isset($count)) {
        $count = Park::count();
    }

    $car->parks()->attach(rand(1, $count));
});
