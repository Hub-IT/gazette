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
		$posts = factory(App\Gazette\Models\Post::class, 11)->create();

		$this->visit(route('home'))
			->seePageIs(route('home'))
			->see('POSTS')
			->see($posts[0]->title)
			->see($posts[0]->subtitle)
			->see($posts[0]->author->avatar)
			->see($posts[0]->author->name)
			->see($posts[0]->category->name)
			->see($posts[0]->minutes_read)
			->see($posts[9]->title)
			->see($posts[9]->subtitle)
			->see($posts[9]->author->avatar)
			->see($posts[9]->author->name)
			->see($posts[9]->category->name)
			->see($posts[9]->minutes_read)
			->dontSee($posts[10]->title);
	}

	/** @test */
	public function it_reads_categories()
	{
		$categories = factory(App\Gazette\Models\Category::class, 3)->create();

		$this->visit(route('home'))
			->seePageIs(route('home'))
			->see('POSTS')
			->see('CATEGORIES')
			->click('categories-tab')
			->see($categories[0]->name)
			->see($categories[1]->name)
			->see($categories[2]->name);
	}
}








