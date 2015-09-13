<?php

use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$authors = User::with(['roles' => function ($query)
		{
			$query->where('name', '=', Role::AUTHOR);
		}])->get();

		$posts = factory(App\Gazzete\Post::class, 15)->create();

		foreach ($posts as $post)
		{
			$post->assignAuthor($authors->random());
		}
	}
}
