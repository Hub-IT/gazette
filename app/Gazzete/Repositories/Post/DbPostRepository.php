<?php
namespace App\Gazzete\Repositories\Post;

use App\Gazzete\Post;
use App\Gazzete\Repositories\DbRepository;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
class DbPostRepository extends DbRepository implements PostRepository
{
	/**
	 * @param $model
	 */
	public function __construct($model = null)
	{
		$model = $model == null ? new Post : $model;

		parent::__construct($model);
	}

	/**
	 * Get latest posts
	 *
	 * @param $total
	 * @return mixed
	 */
	public function getLatest($total = 10)
	{
		$total = ($total > 0 && $total <= 100) ? $total : 10;

		return Post::with('author', 'category')
			->orderBy('created_at')->take($total)->get();
	}

	/**
	 * Return all categories of posts.
	 *
	 * @return mixed
	 */
	public function getCategories()
	{

	}
}