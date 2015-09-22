<?php

use App\Gazzete\Models\Role;
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
		$authors = factory(App\Gazzete\Models\User::class, 3)->create(['role_id' => Role::author()->id]);

		$posts = factory(App\Gazzete\Models\Post::class, 13)->create();

		foreach ($posts as $post)
		{
			$post->assignAuthor($authors->random());
		}
	}
}
