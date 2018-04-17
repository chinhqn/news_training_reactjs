<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'preview_text' => $faker->text(50),
        'detail_text'=> $faker->text(100),
        'image' => $faker->word(), 
        'id_cat'=> $faker->randomDigitNotNull(),
    ];
});
