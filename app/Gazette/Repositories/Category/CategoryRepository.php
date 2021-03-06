<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   15/9/2015
 */

namespace App\Gazette\Repositories\Category;

interface CategoryRepository
{

	/**
	 * Return all categories.
	 *
	 * @return mixed
	 */
	public function all();
}