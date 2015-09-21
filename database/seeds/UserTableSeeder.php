<?php

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
		factory(App\Gazzete\User::class, 'user_author')->create([
			'email'    => env('AUTHOR_EMAIL'),
			'password' => bcrypt(env('AUTHOR_PASS')),
		]);

		factory(App\Gazzete\User::class, 'user_administrator')->create([
			'email'    => env('ADMIN_EMAIL'),
			'password' => bcrypt(env('ADMIN_PASS')),
		]);
	}
}
