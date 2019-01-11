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

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Tutoriel::class, function (Faker\Generator $faker) {

    return [
        'nom'         => $faker->name,
        'introduction'=> str_random(20000),
        'description' => str_random(350),
        'valider'     => random_int(0,1),
        'user_id'     => random_int(1,20),
        'niveau_id'   => 'images_users/'.random_int(1,20).'.jpg',
    ];
});
$factory->define(App\Forum::class, function (Faker\Generator $faker) {

    return [
        'sujet'       => $faker->name,
        'description' => str_random(20000),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'login' => $faker->safeEmail,
        'score' => random_int(1,1000),
        'image' => 'images_users/'.random_int(1,20).'.jpg',
        'password' => str_random(10),
        // 'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});