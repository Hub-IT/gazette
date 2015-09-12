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

$factory->define(App\User::class, function (Faker\Generator $faker)
{
	return [
		'name'           => $faker->name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'avatar'         => $faker->imageUrl(),
	];
});

$factory->define(App\Role::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});

$factory->define(App\Post::class, function ($faker) use ($factory)
{
	$category = factory(App\Category::class)->create();
	$author = factory(App\User::class)->create();
	$author->assignRole(App\Role::author());

	return [
		'title'       => $faker->name,
		'subtitle'    => $faker->name,
		'content'     => $faker->paragraphs(3, true),
		'category_id' => $category->id,
		'user_id'     => $author->id,
	];
});

$factory->define(App\Category::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});
