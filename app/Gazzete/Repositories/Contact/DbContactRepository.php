<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/9/2015
 */

namespace App\Gazzete\Repositories\Contact;


use App\Gazzete\Models\ContactRequest;
use App\Gazzete\Repositories\DbRepository;

class DbContactRepository extends DbRepository implements ContactRepository
{
	/**
	 * @param $model
	 */
	public function __construct($model = null)
	{
		$model = $model == null ? new ContactRequest : $model;

		parent::__construct($model);
	}
}