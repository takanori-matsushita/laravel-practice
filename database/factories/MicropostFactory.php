<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Micropost;
use Faker\Generator as Faker;


$factory->define(Micropost::class, function (Faker $faker) {
  return [
    'content' => $faker->sentence(20),
    'user_id' => rand(1, 6),
    'created_at' => $faker->dateTime(),
    'updated_at' => $faker->dateTime()
  ];
});
