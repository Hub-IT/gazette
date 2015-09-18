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

use Illuminate\Support\Str;

$factory->define(App\Gazzete\User::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'           => $name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'avatar'         => $faker->imageUrl(50, 50),
		'slug'           => Str::slug($name),
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
	$title = $faker->name;
	$content = "<p>" . $faker->paragraph() . "</p><p>" . $faker->paragraph() . "</p><p>" . $faker->paragraph() . "</p>";

	return [
		'title'             => $title,
		'summary'           => $faker->paragraphs(1, true),
		'content'           => $content,
		'minutes_read'      => $faker->numberBetween(1, 100),
		'category_id'       => $category->id,
		'author_id'         => $author->id,
		'slug'              => Str::slug($title),
		'header_background' => $faker->imageUrl(1555, 1037),
	];
});

$factory->define(App\Gazzete\Category::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'   => $name,
		'avatar' => $faker->imageUrl(178, 298),
		'slug'   => Str::slug($name),
	];
});

$factory->define(App\Gazzete\Contact::class, function (Faker\Generator $faker)
{
	return [
		'name'         => $faker->name,
		'email'        => $faker->email,
		'phone_number' => $faker->phoneNumber,
		'message'      => $faker->paragraphs(2, true),
	];
});
