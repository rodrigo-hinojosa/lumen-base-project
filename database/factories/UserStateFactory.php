<?php

use Faker\Generator as Faker;

$factory->define(App\UserState::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'icon' => $faker->text,
        'color_icon' => $faker->colorName,
        'description' => $faker->text,
    ];
});