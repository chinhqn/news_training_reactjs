<?php

<<<<<<< HEAD:database/factories/NewsFactory.php
use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'preview_text' => $faker->text(50),
        'detail_text'=> $faker->text(100),
        'image' => $faker->word(), 
        'id_cat' => $faker->randomDigitNotNull(),
        'id_user' => $faker->randomDigitNotNull(),
    ];
});
=======
//use Faker\Generator as Faker;
//
//$factory->define(App\News::class, function (Faker $faker) {
//    return [
//        'name' => $faker->sentence(),
//        'preview_text' => $faker->text(50),
//        'detail_text'=> $faker->text(100),
//        'image' => $faker->word(),
//    ];
//});
>>>>>>> b98bfe58dd84b5ca14ff0ae4a43179cb54d6a5ef:database/factories/NewFactory.php
