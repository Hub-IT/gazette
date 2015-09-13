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

$factory->define(App\Gazzete\User::class, function (Faker\Generator $faker)
{
	return [
		'name'           => $faker->name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'avatar'         => $faker->imageUrl(),
	];
});

$factory->define(App\Gazzete\Role::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});

$factory->define(App\Gazzete\Post::class, function ($faker) use ($factory)
{
	$category = factory(App\Gazzete\Category::class)->create();
	$author = factory(App\Gazzete\User::class)->create();
	$author->assignRole(App\Gazzete\Role::author());

	return [
		'title'        => $faker->name,
		'subtitle'     => $faker->name,
		'content'      => $faker->paragraphs(3, true),
		'category_id'  => $category->id,
		'author_id'    => $author->id,
		'minutes_read' => $faker->numberBetween(1, 100),
	];
});

$factory->define(App\Gazzete\Category::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});
