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

	/** @test */
	public function it_reads_posts_edit()
	{
		$editor = factory(User::class, 'user_editor')->create();
		factory(Post::class)->create(['published' => true]);
		$post = factory(Post::class)->create(['published' => true]);

		$this->actingAs($editor)
			->visit(route('management.posts.edit', $post->slug))
			->see('<title>Edit Post &middot; Gazzete CMS</title>')
			->see('Meta')
			->see($post->title)
			->see($post->summary)
			->see($post->header_background)
			->seeIsSelected('category_id', "{$post->category->id}")
			->seeIsChecked('published')
			->see($post->content)
			->see('<input class="btn btn-flat btn-primary" type="submit" value="Update">')
			->see(link_to_route('posts.show', 'Show', $post->slug, ['class' => 'btn btn-sm bg-maroon btn-flat margin', 'target' => '_blank']));

		factory(Post::class)->create(['published' => true]);
		$post = factory(Post::class)->create(['published' => false]);

		$this->actingAs($editor)
			->visit(route('management.posts.edit', $post->slug))
			->dontSee(link_to_route('posts.show', 'Show', $post->slug, ['class' => 'btn btn-sm bg-maroon btn-flat margin']));
	}
}