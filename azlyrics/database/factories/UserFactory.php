<?php

use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->company,
        'lyrics' => $faker->text,
        'album_id' => $faker->numberBetween($min = 1, $max = 10) ,
        'verification' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->company,
        'artist_id' => $faker->numberBetween($min = 1, $max = 50) ,
    ];
});

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

$factory->define(App\Artist_Song::class, function (Faker $faker) {
    return [
        'artist_id' => $faker->numberBetween($min = 1, $max = 50),
        'song_id'   => $faker->numberBetween($min = 1, $max = 50)
    ];
});


