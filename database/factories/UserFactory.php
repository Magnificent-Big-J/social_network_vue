<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $name = $faker->name;
    $gender = rand(0,1);
    $avatar= 'avatars/female.jpg';
    if($gender == 1)
    {
        $avatar = 'avatars/male.jpg';
    }
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'slug'=> str_slug($name),
        'gender'=>$gender,
        'avatar'=>$avatar,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
