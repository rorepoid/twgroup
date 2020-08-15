<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publication;
use App\User;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        'title' => $faker->text(15),
        'content' => $faker->text(100),
        'user_id' => factory(User::class)->create()->id,
    ];
});
