<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => 'hsinlu',
        'slug' => str_slug('hsinlu'),
        'email' => 'hsinlu@live.com',
        'telephone' => $faker->phoneNumber,
        'avatar' => $faker->url,
        'website' => $faker->url,
        'address' => $faker->address,
        'location' => $faker->latitude . ', ' . $faker->longitude,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function ($faker) {
    $sentence = $faker->sentence($nbWords = 2);
    return [
        'name' => $sentence,
        'slug' => str_slug($sentence),
    ];
});

$factory->define(App\Tag::class, function ($faker) {
    $word = $faker->word;
    return [
        'name' => $word,
        'slug' => str_slug($word),
    ];
});

$factory->define(App\Article::class, function ($faker) {
    $title = $faker->sentence($nbWords = 6);
    $body = $faker->text($maxNbChars = 5000);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $body,
        'cover' => $faker->imageUrl($width = 670, $height = 370),
        'meta_title' => $faker->title,
        'meta_description' => $faker->title,
        'click' => $faker->numberBetween($min = 1000, $max = 9000),
        'published_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Knot::class, function ($faker) {
    return [
        'brief' => $faker->text($maxNbChars = 300),
        'like_number'=> $faker->numberBetween($min = 500, $max = 800),
    ];
});