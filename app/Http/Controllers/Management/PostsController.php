<?php

namespace App\Http\Controllers\Management;

use App\Gazzete\Post;
use App\Gazzete\Repositories\Category\CategoryRepository;
use App\Gazzete\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PostsController extends Controller
{
	protected $postRepository;
	protected $categoryRepository;

	public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
	{
		$this->middleware('management.auth');
		$this->middleware('management.auth.author');

		$this->postRepository = $postRepository;
		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$post = new Post;

		$categories = $this->categoryRepository->all()->lists('name', 'id');

		return view('management.posts.create', compact('post', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Requests\StorePostRequest $request
	 * @return Response
	 */
	public function store(Requests\StorePostRequest $request)
	{
		$data = $request->only(['title', 'summary', 'content', 'minutes_read', 'header_background', 'category_id']);

		$data['author_id'] = Auth::user()->id;

		if ( false !== $post = $this->postRepository->save($data) )
		{
			Flash::success('Post created.');

			return redirect()->route('management.posts.edit', $post->slug);
		}

		Flash::error('Unable to store post. If this error persist, contact an administrator.');

		return redirect()->back();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $post
	 * @return Response
	 */
	public function edit($post)
	{
		$categories = $this->categoryRepository->all()->lists('name', 'id');

		return view('management.posts.edit', compact('post', 'categories'));
	}
}
