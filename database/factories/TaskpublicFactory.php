<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

$factory->define(App\Models\Taskpublic::class, function (Faker $faker) {
    return [
        'date_start' => $faker->dateTimeBetween('-1 week', '+1 week'),
        'hour_start' => $faker->time,
        'date_end' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
        'hour_end' => $faker->time,
    ];
});
