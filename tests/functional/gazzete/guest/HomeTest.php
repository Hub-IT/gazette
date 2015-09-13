<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class HomeTest verifies a guest can view all content pertaining to the home page '/'.
 */
class HomeTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_posts()
	{
		$posts = factory(App\Gazzete\Post::class, 2)->create();

		$this->visit(route('home'))
			->seePageIs(route('home'))
			->see('POSTS')
			->see($posts[0]->title)
			->see($posts[0]->subtitle)
			->see($posts[0]->author->avatar)
			->see($posts[0]->author->name)
			->see($posts[0]->category->name)
			->see($posts[0]->minutes_read)
			->see($posts[1]->title)
			->see($posts[1]->subtitle)
			->see($posts[1]->author->avatar)
			->see($posts[1]->author->name)
			->see($posts[1]->category->name)
			->see($posts[1]->minutes_read);
	}

	/** @test */
	public function it_reads_panel_menu()
	{
		$this->visit(route('home'))
			->see('Home')
			->see('Contributors')
			->see('About')
			->see('Contact')
			->see('Articles')
			->see('Categories')
			->see('Tags')
			->see('Favorites');
	}
}
