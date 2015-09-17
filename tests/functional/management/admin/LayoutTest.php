<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\admin;

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

		$this->actingAs($user);

		# An user not having a role of admin, should be able to view the next contents.
//			->visit(route('management.home'))
//			->dontSee('<img src="' . $user->avatar . '" class="img-circle" alt="User Image"/>')
//			->dontSee('<p>' . $user->name . '</p>
//                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>')
//			->dontSee('<a href="#"> <i class="fa fa-dashboard"></i> <span>Posts</span>')
//			->dontSee('<li><a href="' . route('management.posts.create') . '"><i class="fa fa-circle-o"></i> Create</a>');

	}

}
