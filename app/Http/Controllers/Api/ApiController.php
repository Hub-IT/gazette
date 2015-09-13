<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponses;


abstract class ApiController extends Controller
{
	protected $statusCode = HttpResponses::HTTP_OK;

	/**
	 * @param Paginator $paginatorData
	 * @param $data
	 * @return mixed
	 */
	public function respondWithPagination($paginatorData, $data)
	{
		$data = array_merge($data, [
			'paginator' => [
				'total_count'   => count($paginatorData->items()),
				'total_pages'   => ceil(count($paginatorData->items()) / $paginatorData->perPage()),
				'current_page'  => $paginatorData->currentPage(),
				'limit'         => $paginatorData->count(),
				'next_page_url' => $paginatorData->nextPageUrl(),
			],
		]);

		return $this->respond($data);
	}

	/**
	 * @param $data
	 * @param array $headers
	 * @return mixed
	 */
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}
}
