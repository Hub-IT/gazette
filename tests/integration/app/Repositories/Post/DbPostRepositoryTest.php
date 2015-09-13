<?php
use App\Gazzete\Post;
use App\Gazzete\Repositories\Post\DbPostRepository;
use App\Gazzete\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
class DbPostRepositoryTest extends \TestCase
{
	use DatabaseMigrations;

	protected $dbPostRepository;

	public function setUp()
	{
		parent::setUp();

		$this->dbPostRepository = new DbPostRepository();
	}

	/** @test */
	public function it_returns_latest_posts()
	{
		$expectedLatestPosts = factory(App\Gazzete\Post::class, 2)->create();
		factory(App\Gazzete\Post::class)->create();

		$actualLatestPosts = $this->dbPostRepository->getLatest(2);

		$this->assertCount(2, $actualLatestPosts);
		$this->assertCount(3, $this->dbPostRepository->all());
		$this->assertEquals($expectedLatestPosts[0], $actualLatestPosts->get(0));
		$this->assertEquals($expectedLatestPosts[1]->title, $actualLatestPosts->get(1)->title);
	}

	/** @test */
	public function it_assigns_author()
	{
		$post = factory(App\Gazzete\Post::class)->create();
		$author = factory(App\Gazzete\User::class)->create();
		$author->assignRole(Role::author());


		$actualPost = Post::find($post->id);
		$post->assignAuthor($author);
		$this->assertNotEquals($post->author, $actualPost->author);

		$actualPost = Post::find($post->id);
		$this->assertNotNull($actualPost->author);
		$this->assertEquals($author->id, $actualPost->author->id);
	}

}