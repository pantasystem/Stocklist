<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => 'room-' . $faker->randomNumber(2),
        'description' => '部屋の説明説明説明説明説明説明説明説明説明'
    ];
});
