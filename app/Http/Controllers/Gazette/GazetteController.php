<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

namespace App\Http\Controllers\Gazette;

use App\Gazette\Models\ContactRequest;
use App\Gazette\Repositories\Category\CategoryRepository;
use App\Gazette\Repositories\Contact\ContactRepository;
use App\Gazette\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;

/**
 * Class GazetteController displays views: home
 *
 * @package App\Http\Controllers\Gazette
 */
class GazetteController extends Controller
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
	 * @var ContactRepository
	 */
	protected $contactRepository;

	/**
	 * @param PostRepository $postRepository
	 * @param CategoryRepository $categoryRepository
	 * @param ContactRepository $contactRepository
	 */
	public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, ContactRepository $contactRepository)
	{
		$this->postRepository = $postRepository;
		$this->categoryRepository = $categoryRepository;
		$this->contactRepository = $contactRepository;
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

		return view('gazette.home', compact('posts', 'categories'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function about()
	{
		return view('gazette.about');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function contact()
	{
		$contact = new ContactRequest;

		return view('gazette.contact', compact('contact'));
	}

	/**
	 * @param Requests\StoreContactRequest $request
	 * @param ContactRequest $contact
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postContact(Requests\StoreContactRequest $request, ContactRequest $contact)
	{
		$this->contactRepository->save($request->only(['name', 'email', 'phone_number', 'message']));

		Flash::success("Contact request successfully sent.");

		return redirect()->back();
	}
}
