<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
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
