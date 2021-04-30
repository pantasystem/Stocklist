<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StockExpire;
use Faker\Generator as Faker;

$factory->define(StockExpire::class, function (Faker $faker) {
    return [
        //
        'expiration_date' => $faker->dateTime
    ];
});
