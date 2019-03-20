<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Arts & Music', 'Biographies', 'Business', 'Kids', 'Comics', 'Computers & Techs', 'Cooking', 'Health & Fitness', 'History', 'Home & Garden'])
    ];
});
