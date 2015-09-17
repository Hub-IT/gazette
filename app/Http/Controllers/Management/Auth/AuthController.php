<?php

namespace App\Http\Controllers\Management\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;
use Validator;

class AuthController extends Controller
{
	protected $loginPath, $redirectAfterLogout, $redirectPath;
	protected $username = 'email';

	use AuthenticatesUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);

		$this->loginPath = route('management.auth.create');
		$this->redirectPath = route('management.home');
		$this->redirectAfterLogout = route('management.auth.create');
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function loginUsername()
	{
		return 'email';
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		$email = '';

		return view('management.authenticate', compact('email'));
	}

	public function authenticated($request, $user)
	{
		Flash::success($this->getSuccessfulLoginMessage());

		return redirect()->intended($this->redirectPath());
	}

	/**
	 * Get the successful login message.
	 *
	 * @return string
	 */
	protected function getSuccessfulLoginMessage()
	{
		return Lang::has('auth.success') ? Lang::get('auth.success') : 'Authentication was successful.';
	}

	public function redirectPath()
	{
		return $this->redirectPath;
	}
}
