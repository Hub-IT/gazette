<?php

namespace App\Http\Controllers\Gazzete;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class ErrorsController extends Controller
{
	public function unauthorized()
	{
		Flash::error('Unauthorized action.');

		return view('gazette.errors.unauthorized');
	}

	public function notFound()
	{
		Flash::error('404. Page Not Found.');

		return view('gazette.errors.unauthorized');
	}
}
