<?php

use Faker\Generator as Faker;

$factory->define(\App\Domain\Files\File::class, function (Faker $faker) {
    return [
        'disk_name' => 'remote',
        'file_name' => 'avatar',
        'file_remote_url' => $faker->imageUrl(),
        'content_type' => App\Domain\Products\Product::PRODUCT_IMAGE
    ];;
});
