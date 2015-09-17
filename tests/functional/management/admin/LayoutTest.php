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
	public function it_reads_sidebar()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::administrator());

		$this->actingAs($user)
			->visit(route('management.home'));
	}


}
