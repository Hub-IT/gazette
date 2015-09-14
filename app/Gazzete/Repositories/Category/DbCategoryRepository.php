<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   15/9/2015
 */

namespace App\Gazzete\Repositories\Category;


use App\Gazzete\Category;
use App\Gazzete\Repositories\DbRepository;

class DbCategoryRepository extends DbRepository implements CategoryRepository
{
	/**
	 * @param $model
	 */
	public function __construct($model = null)
	{
		$model = $model == null ? new Category : $model;

		parent::__construct($model);
	}
}