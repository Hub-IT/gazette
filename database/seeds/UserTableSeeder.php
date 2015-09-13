<?php

use App\Gazzete\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$authors = factory(App\Gazzete\User::class, rand(2, 10))->create();

		foreach ($authors as $author)
		{
			$author->assignRole(Role::author());
		}
	}
}
