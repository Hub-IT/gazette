<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   15/9/2015
 */

namespace App\Gazette\Repositories\Category;

use App\Gazette\Models\Category;
use App\Gazette\Repositories\DbRepository;

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