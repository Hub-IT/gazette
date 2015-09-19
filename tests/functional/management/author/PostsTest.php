<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\author;

use App\Gazzete\Post;
use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_post_create()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::author())->save();

		$this->actingAs($user)
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
			->see('<input name="publish" type="checkbox" value="1"> Publish')
			->see("<h3 class='box-title'>Content <small>Simple and fast</small></h3>")
			->see('<textarea class="textarea" placeholder="Write the article here"')
			->see('<button type="submit" class="btn btn-primary">Create</button>');
	}

	/** @test */
	public function it_creates_a_post()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::author());

		$post = factory(Post::class)->make();

		$this->actingAs($user)
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
	public function it_requests_authorization()
	{

	}
}