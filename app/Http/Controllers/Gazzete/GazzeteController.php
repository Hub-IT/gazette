<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

namespace App\Http\Controllers\Gazzete;

use App\Gazzete\Models\ContactRequest;
use App\Gazzete\Repositories\Category\CategoryRepository;
use App\Gazzete\Repositories\Contact\ContactRepository;
use App\Gazzete\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;

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
		$contact = new ContactRequest;

		return view('gazzete.contact', compact('contact'));
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
