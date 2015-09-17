<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 17/10/2015
 */
namespace tests\functional\management\admin;

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
	public function it_reads_ui()
	{
		$this->visit(route('management.auth'))
			->seePageIs(route('management.dashboard.home'))
			->see('Gazzete CMS')
			->see('<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">');
	}

	/** @test */
	public function it_signs_in()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::administrator());

		$this->actingAs($user);
		throw new \Exception("it_signs_in() not implemented");
	}
}
