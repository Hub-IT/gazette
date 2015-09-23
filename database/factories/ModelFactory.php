<?php
use Illuminate\Support\Str;

$factory->define(App\Gazette\Models\User::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'           => $name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'avatar'         => $faker->imageUrl(50, 50),
		'slug'           => Str::slug($name),
		'role_id'        => factory(App\Gazette\Models\Role::class)->create()->id,
	];
});

$factory->defineAs(App\Gazette\Models\User::class, 'user_administrator', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazette\Models\User::class);
	$author = ['role_id' => \App\Gazette\Models\Role::administrator()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazette\Models\User::class, 'user_author', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazette\Models\User::class);
	$author = ['role_id' => \App\Gazette\Models\Role::author()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazette\Models\User::class, 'user_editor', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazette\Models\User::class);
	$author = ['role_id' => \App\Gazette\Models\Role::editor()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazette\Models\User::class, 'user_contributor', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazette\Models\User::class);
	$author = ['role_id' => \App\Gazette\Models\Role::contributor()->id];

	return array_merge($user, $author);
});

$factory->defineAs(App\Gazette\Models\User::class, 'user_subscriber', function ($faker) use ($factory)
{
	$user = $factory->raw(App\Gazette\Models\User::class);
	$author = ['role_id' => \App\Gazette\Models\Role::subscriber()->id];

	return array_merge($user, $author);
});


$factory->define(App\Gazette\Models\Role::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->name,
	];
});

$factory->define(App\Gazette\Models\Post::class, function ($faker) use ($factory)
{
	$category = factory(App\Gazette\Models\Category::class)->create();
	$author = factory(App\Gazette\Models\User::class, 'user_author')->create();
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

$factory->define(App\Gazette\Models\Category::class, function (Faker\Generator $faker)
{
	$name = $faker->name;

	return [
		'name'   => $name,
		'avatar' => $faker->imageUrl(178, 298),
		'slug'   => Str::slug($name),
	];
});

$factory->define(App\Gazette\Models\ContactRequest::class, function (Faker\Generator $faker)
{
	return [
		'name'         => $faker->name,
		'email'        => $faker->email,
		'phone_number' => $faker->phoneNumber,
		'message'      => $faker->paragraphs(2, true),
	];
});
