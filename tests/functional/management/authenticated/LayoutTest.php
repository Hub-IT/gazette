<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\authenticated;

use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Verify an authenticated user can view common layout contents.
 */
class LayoutTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_header()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::administrator());

		$this->actingAs($user)
			->visit(route('management.home'))
			->see('<title>Home &middot; Gazzete CMS</title>')
			->see('<a href="' . route('management.home') . '" class="logo">')
			->see('<span class="logo-mini"><b>G</b>MS</span>')
			->see('<span class="logo-lg"><b>Gazzete</b>MS</span> </a>')
			->see('<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">')
			->see('<span class="hidden-xs">' . $user->name . '</span>')
			->see('<img src="' . $user->avatar . '" class="user-image" alt="User Image"/>')
			->see('<img src="' . $user->avatar . '" class="img-circle" alt="User Image"/>')
			->see('<p>' . $user->name)
			->see('<small>Member since ' . $user->created_at . '</small>');
	}

}
