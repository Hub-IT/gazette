<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\contributor;

use App\Gazzete\Post;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_destroys_an_unpublished_post()
	{
		$contributor = factory(User::class, 'user_contributor')->create();
		factory(Post::class)->create(['author_id' => $contributor->id, 'published' => false]);

		$this->actingAs($contributor)
			->visit(route('management.posts.index'))
			->press('Delete')
			->see('Are you sure want to proceed?')
			->seePageIs(route('management.posts.index'))
			->see('Post successfully deleted.');
	}

	/** @test */
	public function it_cannot_destroy_posts_not_owned()
	{
		$contributor = factory(User::class, 'user_contributor')->create();
		factory(Post::class)->create();

		$this->actingAs($contributor)
			->visit(route('management.posts.index'))
			->press('Delete')
			->see('Are you sure want to proceed?')
			->seePageIs(route('management.posts.index'))
			->see('You do not have the necessary privileges to delete a post.');
	}

	/** @test */
	public function it_cannot_destroy_owned_published_posts()
	{
		$contributor = factory(User::class, 'user_contributor')->create();
		factory(Post::class)->create(['author_id' => $contributor->id, 'published' => true]);

		$this->actingAs($contributor)
			->visit(route('management.posts.index'))
			->press('Delete')
			->see('Are you sure want to proceed?')
			->seePageIs(route('management.posts.index'))
			->see('You do not have the necessary privileges to delete a post.');
	}
}