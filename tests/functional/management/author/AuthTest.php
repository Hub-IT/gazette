<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 17/10/2015
 */
namespace tests\functional\management\author;

use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Verify an account of type author is able to login
 */
class AuthTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_signs_in()
	{
		$user = factory(User::class)->create(['password' => bcrypt('pass')]);
		$user->assignRole(Role::author());

		$this
			->visit(route('management.auth.create'))
			->type($user->email, 'email')
			->type('pass', 'password')
			->press('Sign In')
			->seePageIs(route('management.home'))
			->see('Authentication was successful.');
	}
}
