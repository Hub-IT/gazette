<?php

namespace App\Http\Controllers\Api\v1;

use App\Gazzete\Post;
use App\Gazzete\Repositories\Post\PostRepository;
use App\Gazzete\Transformers\PostTransformer;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PostsController extends ApiController
{
	protected $repository;
	/**
	 * @var PostTransformer
	 */
	private $transformer;

	public function __construct(PostRepository $repository, PostTransformer $transformer)
	{
		$this->repository = $repository;
		$this->transformer = $transformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['limit'] = Input::get('limit');
		$data['page'] = Input::get('page');

		$validator = Validator::make($data, ['limit' => 'numeric', 'page' => 'numeric']);

		if ( $validator->fails() ) return $this->respondUnprocessableEntity();

		$limit = Input::get('limit') ?: 50;
		$limit = ($limit < 1 || $limit > 100) ? 10 : $limit;

		$posts = Post::paginate($limit);

		return $this->respondWithPagination($posts, [
			'posts' => $this->transformer->transformCollection($posts->all()),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 * @param  int $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
