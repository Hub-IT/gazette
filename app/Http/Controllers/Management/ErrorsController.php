<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Laracasts\Flash\Flash;

/**
 * Class ErrorsController
 * @package App\Http\Controllers\Management
 */
class ErrorsController extends Controller
{
	public function unauthorized()
	{
		Flash::error('Unauthorized action.');

		return view('management.errors.unauthorized');
	}

	public function notFound()
	{
		Flash::error('404. Page Not Found.');

		return view('management.errors.unauthorized');
	}
}
