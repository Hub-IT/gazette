<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;

class ContactRequestsController extends Controller
{
	public function __construct()
	{
		$this->middleware('management.auth');
		$this->middleware('management.auth.administrator');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('management.contact_requests.index');
	}
}
