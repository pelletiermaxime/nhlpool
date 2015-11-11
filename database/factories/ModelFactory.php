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

$factory->define(Nhlpool\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Nhlpool\PoolType::class, function (Faker\Generator $faker) {
    return [
        'created_by' => factory(Nhlpool\User::class)->create()->id,
        'name'       => $faker->sentence(3),
    ];
});

$factory->define(Nhlpool\PoolTypes\TeamsScoreType::class, function (Faker\Generator $faker) {
    return [];
});

$factory->define(Nhlpool\Pool::class, function (Faker\Generator $faker) {
    $start_date = $faker->dateTimeBetween('-200 days', 'now');
    $end_date = $faker->dateTimeInInterval($start_date, '+30 days');
    return [
        'pool_type_id' => factory(Nhlpool\PoolType::class)->create()->id,
        'start_date'   => $start_date,
        'end_date'     => $end_date,
    ];
});
