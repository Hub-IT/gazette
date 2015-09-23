<?php

namespace App\Http\Controllers\Management;

use App\Gazette\Repositories\Contact\ContactRepository;
use App\Http\Requests;
use Illuminate\Http\Response;

class ContactRequestsController extends BaseController
{
	protected $contactRepository;

	public function __construct(ContactRepository $contactRepository)
	{
		parent::__construct();

		$this->contactRepository = $contactRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactRequests = $this->contactRepository->all();

		return view('management.contact_requests.index', compact('contactRequests'));
	}
}
