<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace tests\integration\app\Gazzete\Repositories;

use App\Gazzete\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends \TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_checks_user_role()
	{
		$user = factory(\App\Gazzete\User::class)->create();

		$this->assertFalse($user->hasRole(Role::administrator()));
		$this->assertFalse($user->hasRole(Role::author()));

		$user->assignRole(Role::administrator())->save();

		$this->assertTrue($user->hasRole(Role::administrator()));
		$this->assertFalse($user->hasRole(Role::author()));

		$user->assignRole(Role::author());

		$this->assertTrue($user->hasRole(Role::administrator()));
		$this->assertTrue($user->hasRole(Role::author()));
	}
}