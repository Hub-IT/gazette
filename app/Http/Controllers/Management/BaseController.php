<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace app\Http\Controllers\Management;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
	public function __construct()
	{
		$this->middleware('management.auth');
	}

}