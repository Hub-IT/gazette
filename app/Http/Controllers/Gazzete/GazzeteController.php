<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

namespace App\Http\Controllers\Gazzete;

use App\Gazzete\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;

/**
 * Class GazzeteController displays views: home
 *
 * @package App\Http\Controllers\Gazzete
 */
class GazzeteController extends Controller
{
	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	/**
	 * Display home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		$posts = $this->postRepository->getLatest();

		dd($posts->get(0)->author()->name);
		return view('gazzete.home', compact('posts'));
	}
}
