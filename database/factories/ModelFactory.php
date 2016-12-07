<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Models\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'user_id' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(App\Models\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(10),
        'description' => $faker->paragraph(4),
        'date_de_debut'=>$faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
        'date_de_fin'=>$faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
        'lieu'=>$faker->sentence(10),
        'tarif'=>$faker->rand(1,999),
        'organ_id' => rand(1,20)
    ];
});