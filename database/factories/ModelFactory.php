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

use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shipment::class, function (Faker\Generator $faker) {
    return [
        'shipping_provider' => $faker->name,
        'tracking_code' => $faker->name,
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'cost' => $faker->name,
        'status' => 'pending',
    ];
});

$factory->define(App\Package::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numerify(),
        'status' => 'pending',
        'open_image' => $faker->word() . $faker->fileExtension,
        'user_id'=> 111,
        'received_at' => $faker->date(),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});
