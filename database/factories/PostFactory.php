<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
		'title' => $faker->unique()->sentence($nbWords = 1, $variableNbWords = true),
		'body' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
    ];
});
