<?php

use Illuminate\Database\Seeder;

class ContactRequestTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(\App\Gazette\Models\ContactRequest::class, 3)->create();
	}
}
