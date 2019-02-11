<?php

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [

        'name_en' =>  $faker->userName ,
        'name_ar' =>  $faker->userName ,
        'email' =>  $faker->email ,
        'website' =>  $faker->url ,
        'logo' =>  'default.jpg' ,
    ];
});
