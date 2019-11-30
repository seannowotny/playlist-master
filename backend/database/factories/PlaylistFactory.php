<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Playlist;
use Faker\Generator as Faker;
use App\Http\Resources\User as UserResource;

$factory->define(Playlist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
