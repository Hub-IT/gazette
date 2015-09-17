<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/9/2015
 */

namespace tests\functional\management\author;

use App\Gazzete\Role;
use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_post_creation_page()
	{
		$user = factory(User::class)->create();
		$user->assignRole(Role::author());

		$this->actingAs($user)
			->visit(route('management.home'))
			->click('posts-create')
			->seePageIs(route('management.posts.create'))
			->see('<title>Create Post &middot; Gazzete CMS</title>');
	}
}