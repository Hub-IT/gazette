<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/9/2015
 */

namespace App\Gazette\Repositories\Contact;


use App\Gazette\Models\ContactRequest;
use App\Gazette\Repositories\DbRepository;

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