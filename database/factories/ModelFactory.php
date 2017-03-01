<?php

$factory->define(AppFinancial\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(AppFinancial\Models\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'role' => AppFinancial\Models\User::ROLE_ADMIN
    ];
});
