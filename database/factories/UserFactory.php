<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'user_type_id' => App\UserType::all()->random()->id,
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'username' => $faker->unique()->userName,
        'password' => 'pass',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];

});