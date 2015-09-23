<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\administrator;

use App\Gazette\Models\User;
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
		$administrator = factory(User::class)->create();

		$this->actingAs($administrator)
			->visit(route('management.home'))
			->see('<img src="' . $administrator->avatar . '" class="img-circle" alt="User Image"/>')
			->see('<p>' . $administrator->name . '</p>')
			->see('<a href="#"> <i class="fa fa-newspaper-o"></i> <span>Posts</span>')
			->see('<a href="' . route('management.posts.create') . '" id="posts-create">')
			->see('<a href="#"> <i class="fa fa-envelope"></i> <span>Contact Requests</span>')
			->see('<a href="' . route('management.contact-requests.index') . '" id="contact-requests-index">');
	}

}
