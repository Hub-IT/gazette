<?php
use Illuminate\Support\Str;

$factory->define(App\Gazzete\Models\User::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'           => $name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'avatar'         => $faker->imageUrl(50, 50),
		'slug'           => Str::slug($name),
		'role_id'        => factory(App\Gazzete\Models\Role::class)->create()->id,
	];
});

$factory->defineAs(App\Gazzete\Models\User::class, 'user_administrator', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazzete\Models\User::class);
	$author = ['role_id' => \App\Gazzete\Models\Role::administrator()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazzete\Models\User::class, 'user_author', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazzete\Models\User::class);
	$author = ['role_id' => \App\Gazzete\Models\Role::author()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazzete\Models\User::class, 'user_editor', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazzete\Models\User::class);
	$author = ['role_id' => \App\Gazzete\Models\Role::editor()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazzete\Models\User::class, 'user_contributor', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazzete\Models\User::class);
	$author = ['role_id' => \App\Gazzete\Models\Role::contributor()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazzete\Models\User::class, 'user_subscriber', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazzete\Models\User::class);
	$author = ['role_id' => \App\Gazzete\Models\Role::subscriber()->id];

	return array_merge($user, $author);
});


$factory->define(App\Gazzete\Models\Role::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});

$factory->define(App\Gazzete\Models\Post::class, function ($faker) use ($factory)
{
	$category = factory(App\Gazzete\Models\Category::class)->create();
	$author = factory(App\Gazzete\Models\User::class, 'user_author')->create();
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
		'published'         => $faker->boolean,
	];
});

$factory->define(App\Gazzete\Models\Category::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'   => $name,
		'avatar' => $faker->imageUrl(178, 298),
		'slug'   => Str::slug($name),
	];
});

$factory->define(App\Gazzete\Models\ContactRequest::class, function (Faker\Generator $faker)
{
	return [
		'name'         => $faker->name,
		'email'        => $faker->email,
		'phone_number' => $faker->phoneNumber,
		'message'      => $faker->paragraphs(2, true),
	];
});
