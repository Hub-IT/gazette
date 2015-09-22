<?php

namespace App\Http\Controllers\Management;

use App\Http\Requests;
use Illuminate\Http\Response;

class DashboardController extends BaseController
{
	/**
	 * Display the dashboard home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		return view('management.home');
	}
}
