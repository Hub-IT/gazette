<?php
use App\Gazzete\Repositories\Post\DbPostRepository;
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
		$this->assertEquals($expectedLatestPosts[0]->title, $actualLatestPosts->get(0)->title);
		$this->assertEquals($expectedLatestPosts[1]->title, $actualLatestPosts->get(1)->title);
	}

}