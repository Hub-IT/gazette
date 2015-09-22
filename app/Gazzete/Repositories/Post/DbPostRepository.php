<?php
namespace App\Gazzete\Repositories\Post;

use App\Gazzete\Models\Post;
use App\Gazzete\Models\User;
use App\Gazzete\Repositories\DbRepository;
use Illuminate\Support\Str;

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

	/**
	 * @param array $data
	 * @return bool
	 */
	public function save(array $data)
	{
		$data['slug'] = Str::slug($data['title']);

		$this->model->fill($data);

		$author = User::find($data['author_id'])->firstOrFail();
		$this->model->assignAuthor($author);

		$category = User::find($data['category_id'])->firstOrFail();
		$this->model->assignCategory($category);

		return $this->model->save() ? $this->model : false;
	}
}