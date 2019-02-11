<?php

use Faker\Generator as Faker;

$factory->define(\App\Employ::class, function (Faker $faker) {
    return [
        
            'first_name_en' =>  $faker->firstName ,
            'first_name_ar' =>  $faker->lastName ,
            'last_name_en' =>  $faker->firstName ,
            'last_name_ar' =>  $faker->lastName ,
            'email' =>  $faker->email ,
            'phone' =>  $faker->phoneNumber ,
            'company_id' =>  $faker->numberBetween(1, 50) ,
    ];
});
