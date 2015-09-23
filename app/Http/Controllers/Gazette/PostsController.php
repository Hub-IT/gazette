<?php
namespace App\Http\Controllers\Gazette;

use App\Gazette\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PostsController extends Controller
{
	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $post
	 * @return Response
	 */
	public function show($post)
	{
		$latestPosts = $this->postRepository->getLatest(6);

		return view("gazette.posts.show", compact('post', 'latestPosts'));
	}
}
