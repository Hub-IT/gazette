<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ArticleTest verifies a guest can view all content pertaining to an article.
 */
class PostTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_post()
	{
		$post = factory(App\Gazette\Models\Post::class)->create();

		$this->visit(route('posts.show', $post->slug))
			->seePageIs(route('posts.show', $post->slug))->see('POSTS')
			->see('<title>' . $post->title . ' &middot; Gazette</title>')
			->see($post->author->name)
			->see($post->category->name)
			->see($post->minutes_read)
			->see($post->title)
			->see($post->subtitle)
			->see($post->content)
			->see($post->create_at)
			->see('SHARE THIS ARTICLE');
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
