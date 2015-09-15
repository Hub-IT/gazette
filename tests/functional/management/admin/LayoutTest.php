<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\admin;

use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Class LayoutTest verifies a administrator can view all content pertaining to the layout of management panel.
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
			->visit(route('management.dashboard.home'))
			->seePageIs(route('management.dashboard.home'))
			->see('Gazzete CMS')
			->see('<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">');
//			->see($user->name)
//			->click('<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">')
//			->see('GMS');
	}

	/** @test */
	public function it_reads_sidebar()
	{
		$this->visit(route('management.dashboard'))
			->seePageIs(route('management.dashboard'))
			->see('<span class="menu-trigger animated fadeInDown"')
			->see('Gazzete')
			->see('DEREE News. 24/7.')
			->see('Latest story.')
			->see('Subtitle')
			->see('Join Our Newsletter');
	}

	/** @test */
	public function it_reads_footer()
	{
		$this->visit(route('home'))
			->see('Home')
			->see('Contributors')
			->see('About')
			->see('Contact')
			->see('Articles')
			->see('Categories')
			->see('Tags')
			->see('Favorites');
	}
}
