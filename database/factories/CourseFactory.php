<?php

    use Faker\Generator as Faker;

    $factory->define(App\Course::class, function (Faker $faker) {
        return [
            'subject_id'  => random_int(1, App\Subject::count()),
            'name'        => $faker->jobTitle,
            'description' => $faker->paragraph,
        ];
    });
