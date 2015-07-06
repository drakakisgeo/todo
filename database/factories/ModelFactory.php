<?php


$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});


    $factory->define(App\Task::class, function ($faker) {
        return [
          'task' => $faker->sentence,
          'status'=> $faker->randomElement([0,1])
        ];
    });
