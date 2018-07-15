<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'user_type_id' => App\UserType::all()->random()->id,
        'user_state_id' => App\UserState::all()->random()->id,
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'username' => $faker->unique()->userName,
        'password' => 'pass',
    ];

});