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
		$author = User::with(['roles' => function ($query)
		{
			$query->where('name', '=', Role::AUTHOR);
		}])->first();

		$post = factory(App\Gazzete\Post::class)->create();

		$post->assignAuthor($author);
	}
}
