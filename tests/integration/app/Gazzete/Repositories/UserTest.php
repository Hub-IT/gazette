<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace tests\integration\app\Gazette\Repositories;

use App\Gazette\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends \TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_checks_user_role()
	{
		$administrator = factory(\App\Gazette\Models\User::class, 'user_administrator')->create();
		$editor = factory(\App\Gazette\Models\User::class, 'user_editor')->create();
		$author = factory(\App\Gazette\Models\User::class, 'user_author')->create();
		$contributor = factory(\App\Gazette\Models\User::class, 'user_contributor')->create();
		$subscriber = factory(\App\Gazette\Models\User::class, 'user_subscriber')->create();

		$this->assertTrue($administrator->hasRole(Role::ADMINISTRATOR));
		$this->assertTrue($editor->hasRole(Role::EDITOR));
		$this->assertTrue($author->hasRole(Role::AUTHOR));
		$this->assertTrue($contributor->hasRole(Role::CONTRIBUTOR));
		$this->assertTrue($subscriber->hasRole(Role::SUBSCRIBER));
	}
}