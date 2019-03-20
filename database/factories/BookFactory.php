<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => str_replace('.', '', ucwords($faker->sentence(3))),
        'description' => $faker->text,
        'author_id' => function(){
            return App\Author::inRandomOrder()->first()->id;
        },
        'category_id' => function(){
            return App\Category::inRandomOrder()->first()->id;
        },
        'availability_id' => $faker->biasedNumberBetween(1,2, function($x) { return 1 - sqrt($x); }),
        'price' => $faker->numberBetween(5, 50)
    ];
});
