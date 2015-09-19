<?php
use App\Gazzete\Post;
use App\Gazzete\Repositories\Category\DbCategoryRepository;
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
	protected $dbCategoryRepository;

	public function setUp()
	{
		parent::setUp();

		$this->dbPostRepository = new DbPostRepository();

		$this->dbCategoryRepository = new DbCategoryRepository();
	}

	/** @test */
	public function it_returns_latest_posts()
	{
		$expectedLatestPosts = factory(App\Gazzete\Post::class, 2)->create();
		factory(App\Gazzete\Post::class)->create();

		$actualLatestPosts = $this->dbPostRepository->getLatest(2);

		$this->assertCount(2, $actualLatestPosts);
		$this->assertCount(3, $this->dbPostRepository->all());

		$this->assertEquals($expectedLatestPosts[0]->id, $actualLatestPosts->get(0)->id);
		$this->assertEquals($expectedLatestPosts[0]->title, $actualLatestPosts->get(0)->title);
		$this->assertEquals($expectedLatestPosts[0]->author, $actualLatestPosts->get(0)->author);
		$this->assertEquals($expectedLatestPosts[0]->category, $actualLatestPosts->get(0)->category);

		$this->assertEquals($expectedLatestPosts[1]->id, $actualLatestPosts->get(1)->id);
		$this->assertEquals($expectedLatestPosts[1]->title, $actualLatestPosts->get(1)->title);
		$this->assertEquals($expectedLatestPosts[1]->author, $actualLatestPosts->get(1)->author);
		$this->assertEquals($expectedLatestPosts[1]->category, $actualLatestPosts->get(1)->category);
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

	/** @test */
	public function it_assigns_category()
	{
		$post = factory(App\Gazzete\Post::class)->create();
		$category = factory(App\Gazzete\Category::class)->create();

		$this->assertNotEquals($post->category->name, $category->name);

		$post->assignCategory($category);

		$actualPost = Post::find($post->id);

		$this->assertEquals($category->name, $actualPost->category->name);
	}

	/** @test */
	public function it_returns_all_categories()
	{
		$expectedCategories = factory(App\Gazzete\Category::class, 2)->create();

		$actualCategories = $this->dbCategoryRepository->all();

		$this->assertCount(2, $actualCategories);
		$this->assertEquals($expectedCategories[0]->id, $actualCategories->get(0)->id);
		$this->assertEquals($expectedCategories[0]->name, $actualCategories->get(0)->name);
		$this->assertEquals($expectedCategories[1]->id, $actualCategories->get(1)->id);
		$this->assertEquals($expectedCategories[1]->name, $actualCategories->get(1)->name);
	}

	/** @test */
	public function it_creates_a_post()
	{
		$post = factory(App\Gazzete\Post::class)->make();

		$post = ['title'             => $post->title,
		         'summary'           => $post->summary,
		         'content'           => $post->content,
		         'minutes_read'      => $post->minutes_read,
		         'slug'              => $post->slug,
		         'header_background' => $post->header_background,
		         'author_id'         => $post->author_id,
		         'category_id'       => $post->category_id];

		$this->notSeeInDatabase('posts', $post);

		$this->dbPostRepository->save($post);

		$this->seeInDatabase('posts', $post);
	}
}