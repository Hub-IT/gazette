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
		$author = factory(App\Gazzete\User::class)->create();

		$author->assignRole(Role::author());
	}
}
