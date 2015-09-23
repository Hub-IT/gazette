<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\subscriber;

use App\Gazette\Models\Post;
use App\Gazette\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_cannot_read_posts_create()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();

		$this->actingAs($subscriber)
			->visit(route('management.posts.create'))
			->seePageIs(route('home'))
			->see('You do not have the necessary authorization.');
	}

	/** @test */
	public function it_cannot_read_posts_store()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();

		$this->actingAs($subscriber)
			->post(route('management.posts.store'))
			->see('Redirecting to ' . link_to_route('gazette.errors.unauthorized'));
	}

	/** @test */
	public function it_cannot_read_posts_index()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();

		$this->actingAs($subscriber)
			->visit(route('management.posts.index'))
			->seePageIs(route('home'))
			->see('You do not have the necessary authorization.');
	}

	/** @test */
	public function it_cannot_read_posts_edit()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();
		$post = factory(Post::class)->create();

		$this->actingAs($subscriber)
			->visit(route('management.posts.edit', $post->slug))
			->seePageIs(route('home'))
			->see('You do not have the necessary authorization.');
	}

	/** @test */
	public function it_cannot_read_posts_update()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();

		$this->actingAs($subscriber)
			->put(route('management.posts.update'))
			->see('Redirecting to ' . link_to_route('gazette.errors.unauthorized'));
	}

	/** @test */
	public function it_cannot_read_posts_destroy()
	{
		$subscriber = factory(User::class, 'user_subscriber')->create();

		$this->actingAs($subscriber)
			->delete(route('management.posts.destroy'))
			->see('Redirecting to ' . link_to_route('gazette.errors.unauthorized'));
	}
}