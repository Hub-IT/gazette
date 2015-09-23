<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 22/10/2015
 */
namespace App\Http\Controllers\Management;

use App\Gazette\Models\Post;
use App\Gazette\Models\Role;
use App\Gazette\Repositories\Category\CategoryRepository;
use App\Gazette\Repositories\Post\PostRepository;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PostsController extends BaseController
{
	protected $postRepository;

	protected $categoryRepository;

	public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
	{
		parent::__construct();

		$this->postRepository = $postRepository;

		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->postRepository->all();

		return view('management.posts.index', compact('posts'));
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $post
	 * @param Requests\DestroyPostRequest $destroyPostRequest
	 * @return Response
	 */
	public function destroy($post, Requests\DestroyPostRequest $destroyPostRequest)
	{
		$user = Auth::user();

		if ( $user->hasRole(Role::ADMINISTRATOR) || $user->hasRole(Role::EDITOR)
			|| ($user->hasRole(Role::AUTHOR) && $post->author->id === $user->id)
			|| ($user->hasRole(Role::CONTRIBUTOR) && $post->author->id === $user->id && ! $post->published)
		)
		{
			if ( $this->postRepository->destroyById($post->id) )
			{
				Flash::success('Post successfully deleted.');

				return redirect()->route('management.posts.index');
			}

			Flash::error('Something went wrong.');
		} else
		{
			Flash::error('You do not have the necessary privileges to delete a post.');

			return redirect()->back();
		}

		return redirect()->back();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Requests\UpdatePostRequest $updatePostRequest
	 * @param Post $post
	 * @return Response
	 * @internal param Request $request
	 */
	public function update(Requests\UpdatePostRequest $updatePostRequest, Post $post)
	{
		$user = Auth::user();

		if ( $user->hasRole(Role::ADMINISTRATOR) || $user->hasRole(Role::EDITOR)
			|| ($user->hasRole(Role::AUTHOR) && $post->author->id === $user->id)
			|| ($user->hasRole(Role::CONTRIBUTOR) && $post->author->id === $user->id && ! $post->published)
		)
		{
			if ( $this->postRepository->destroyById($post->id) )
			{
				Flash::success('Post successfully deleted.');

				return redirect()->route('management.posts.index');
			}

			Flash::error('Something went wrong.');
		} else
		{
			Flash::error('You do not have the necessary privileges to delete a post.');

			return redirect()->back();
		}

		return redirect()->back();

	}
}
