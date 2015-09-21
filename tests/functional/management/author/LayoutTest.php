<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\author;

use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Verify an author user can view only his/her layout contents.
 */
class LayoutTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_sidebar()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user)
			->visit(route('management.home'))
			->see('<img src="' . $user->avatar . '" class="img-circle" alt="User Image"/>')
			->see('<p>' . $user->name . '</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>')
			->see('<a href="#"> <i class="fa fa-dashboard"></i> <span>Posts</span>')
			->see('<a href="' . route('management.posts.create') . '" id="posts-create">');
	}
}
