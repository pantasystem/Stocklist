<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Box;
use Faker\Generator as Faker;

$factory->define(Box::class, function (Faker $faker) {

    return [
        'name' => '収納' . $faker->randomNumber(2),
        'description' => '説明説明説明説明説明説明説明説明説明'
    ];
});
