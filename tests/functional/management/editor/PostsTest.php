<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\editor;

use App\Gazzete\Models\Post;
use App\Gazzete\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_destroys_a_post()
	{
		$administrator = factory(User::class, 'user_editor')->create();
		factory(Post::class)->create();

		$this->actingAs($administrator)
			->visit(route('management.posts.index'))
			->press('Delete')
			->see('Are you sure want to proceed?')
			->seePageIs(route('management.posts.index'))
			->see('Post successfully deleted.');
	}
}