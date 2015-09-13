<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class HomeTest verifies a guest can view all content pertaining to the home page '/'.
 */
class PostsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_posts()
	{
		$posts = factory(App\Gazzete\Post::class, 2)->create();

		$this->get(route('api.v1.posts.index'))
			->seeJsonEquals([
				'posts'     => [
					[
						'title'        => $posts[0]->title,
						'summary'      => $posts[0]->summary,
						'content'      => $posts[0]->content,
						'minutes_read' => $posts[0]->minutes_read,
					],
					[
						'title'        => $posts[1]->title,
						'summary'      => $posts[1]->summary,
						'content'      => $posts[1]->content,
						'minutes_read' => $posts[1]->minutes_read,
					],
				],
				'paginator' => [
					'total_count'   => 2,
					'total_pages'   => 1,
					'current_page'  => 1,
					'limit'         => 2,
					'next_page_url' => null,
				],
			])
			->assertResponseOk();
	}
}
