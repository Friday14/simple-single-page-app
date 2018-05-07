<?php

use Faker\Generator as Faker;

$factory->define(\App\Domain\Categories\Category::class, function (Faker $faker) {
    return [
        'name' => 'Category ' . $faker->colorName
    ];
});
