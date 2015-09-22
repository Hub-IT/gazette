<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\administrator;

use App\Gazzete\Models\Post;
use App\Gazzete\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_posts_index()
	{
		$post = factory(Post::class)->create();
		$administrator = factory(User::class, 'user_administrator')->create();

		$this->actingAs($administrator)
			->visit(route('management.home'))
			->click('posts-index')
			->seePageIs(route('management.posts.index'))
			->see('All Posts')
			->see('Title')
			->see($post->title)
			->see('Summary')
			->see('Author')
			->see($post->author->name)
			->see('Category')
			->see($post->category->name)
			->see(substr($post->summary, 0, 23))
			->see('Published')
			->see('No')
			->see('Actions')
			->see(link_to_route('posts.show', 'Show', $post->slug, ["class" => "btn btn-info btn-flat", 'target' => '_blank']))
			->see(link_to_route('management.posts.edit', 'Edit', $post->slug, ["class" => "btn btn-primary btn-flat"]))
			->see('<form method="POST" action="' . route("management.posts.destroy", $post->slug) . '" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">')
			->see('<input class="confirm btn btn-danger btn-flat" type="submit" value="Delete">');
	}

	/** @test */
	public function it_reads_posts_create()
	{
		$administrator = factory(User::class, 'user_administrator')->create();

		$this->actingAs($administrator)
			->visit(route('management.home'))
			->click('posts-create')
			->seePageIs(route('management.posts.create'))
			->see('<title>Create Post &middot; Gazzete CMS</title>')
			->see('Meta')
			->see('<label for="title">Title</label>')
			->see('<input class="form-control" placeholder="Required" name="title" type="text" id="title">')
			->see('<label for="summary">Summary</label>')
			->see('<input class="form-control" placeholder="Required. One to two sentences." name="summary" type="text" id="summary">')
			->see('<label for="header_background">Header Background URL</label>')
			->see('<input class="form-control" placeholder="Recommended but not required. Size: 1555x1037 px." name="header_background" type="text" id="header_background">')
			->see('<label for="category_id">Category</label>')
			->see('<select class="select2 form-control" style="width: 100%" id="category_id" name="category_id"><option selected="selected" value="">Select a category</option>')
			->see('<input name="published" type="checkbox" value="1"> Publish')
			->see("<h3 class='box-title'>Content")
			->see("<small>Simple and fast</small>")
			->see('<textarea class="textarea" placeholder="Write the article here"')
			->see('<input class="btn btn-primary" type="submit" value="Create">');
	}

	/** @test */
	public function it_reads_posts_edit()
	{
		$administrator = factory(User::class, 'user_administrator')->create();
		factory(Post::class)->create(['published' => true]);
		$post = factory(Post::class)->create(['published' => true]);

		$this->actingAs($administrator)
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
			->see(link_to_route('posts.show', 'Show', $post->slug, ['class' => 'btn btn-sm bg-maroon btn-flat margin',
			'target' => '_blank']));

		factory(Post::class)->create(['published' => true]);
		$post = factory(Post::class)->create(['published' => false]);

		$this->actingAs($administrator)
			->visit(route('management.posts.edit', $post->slug))
			->dontSee(link_to_route('posts.show', 'Show', $post->slug, ['class' => 'btn btn-sm bg-maroon btn-flat margin']));
	}

	/** @test */
	public function it_creates_a_post()
	{
		$administrator = factory(User::class, 'user_administrator')->create();
		$post = factory(Post::class)->make();

		$this->actingAs($administrator)
			->visit(route('management.posts.create'))
			->type($post->title, 'title')
			->type($post->summary, 'summary')
			->type($post->header_background, 'header_background')
			->select($post->category->id, 'category_id')
			->type($post->content, 'content')
			->press('Create')
			->see('Post created.');
	}

	/** @test */
	public function it_destroys_a_post()
	{
		$administrator = factory(User::class, 'user_administrator')->create();
		factory(Post::class)->create();

		$this->actingAs($administrator)
			->visit(route('management.posts.index'))
			->press('Delete')
			->see('Are you sure want to proceed?')
			->seePageIs(route('management.posts.index'))
			->see('Post successfully deleted.');
	}
}