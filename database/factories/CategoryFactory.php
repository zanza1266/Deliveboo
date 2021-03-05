<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {

    $name = $faker->colorName();

    return [
        'name' => $name,
        'created_at' =>Carbon::now()->toDateTimeString()
    ];
});
