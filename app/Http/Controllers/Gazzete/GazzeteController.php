<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

namespace App\Http\Controllers\Gazzete;

use App\Gazzete\Repositories\Category\CategoryRepository;
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
	/**
	 * @var PostRepository
	 */
	protected $postRepository;
	/**
	 * @var CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * @param PostRepository $postRepository
	 * @param CategoryRepository $categoryRepository
	 */
	public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
	{
		$this->postRepository = $postRepository;

		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * Display home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		$posts = $this->postRepository->getLatest();

		$categories = $this->categoryRepository->all();

		return view('gazzete.home', compact('posts', 'categories'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function about()
	{
		return view('gazzete.about');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function contact()
	{
		return view('gazzete.contact');
	}
}
