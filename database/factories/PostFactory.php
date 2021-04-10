<?php

use App\Post;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(5, true),
        'excerpt' => $faker->sentence(5),
        'body' => $faker->text(),
        'user_id' => 1,
    ];
});
