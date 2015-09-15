<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ArticleTest verifies a guest can view all content pertaining to an article.
 */
class ArticleTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_posts()
	{
		$post = factory(App\Gazzete\Post::class)->create();

		$this->visit(route('posts', $post->slug))
			->seePageIs(route('posts', $post->slug))->see('POSTS')
			->see($post->title)
			->see($post->subtitle)
			->see($post->author->avatar)
			->see($post->author->name)
			->see($post->category->name)
			->see($post->minutes_read);
	}

	/** @test */
	public function it_reads_categories()
	{
		$categories = factory(App\Gazzete\Category::class, 3)->create();

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








