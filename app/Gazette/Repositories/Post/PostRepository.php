<?php

namespace App\Gazette\Repositories\Post;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
interface PostRepository
{
	public function getById($id);

	public function count();

	public function all();

	public function save(array $data);

	/**
	 * Get latest posts
	 *
	 * @param $total
	 * @return mixed
	 */
	public function getLatest($total = 10);

	/**
	 * Destroy model from database.
	 *
	 * @param $id
	 * @return mixed
	 */
	public function destroyById($id);
}
