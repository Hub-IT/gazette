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
		$administrator = factory(\App\Gazzete\User::class, 'user_administrator')->create();
		$editor = factory(\App\Gazzete\User::class, 'user_editor')->create();
		$author = factory(\App\Gazzete\User::class, 'user_author')->create();
		$contributor = factory(\App\Gazzete\User::class, 'user_contributor')->create();
		$subscriber = factory(\App\Gazzete\User::class, 'user_subscriber')->create();

		$this->assertTrue($administrator->hasRole(Role::ADMINISTRATOR));
		$this->assertTrue($editor->hasRole(Role::EDITOR));
		$this->assertTrue($author->hasRole(Role::AUTHOR));
		$this->assertTrue($contributor->hasRole(Role::CONTRIBUTOR));
		$this->assertTrue($subscriber->hasRole(Role::SUBSCRIBER));
	}
}