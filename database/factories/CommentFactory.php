<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Publication;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(50),
        'status' => 'APROBADO',
        'user_id' => factory(User::class)->create()->id,
        'publication_id' => factory(Publication::class)->create()->id,
    ];
});
