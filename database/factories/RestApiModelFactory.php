<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\RestApiModel;
use Faker\Generator as Faker;

$factory->define(RestApiModel::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->text(200)
    ];
});
