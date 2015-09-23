<?php

namespace App\Http\Middleware;

use App\Gazette\Models\Role;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Laracasts\Flash\Flash;

class AuthenticateManagement
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( $this->auth->guest() )
		{
			if ( $request->ajax() ) return response('Unauthorized.', 401);

			Flash::error('Authentication required.');

			return redirect()->guest(route('management.auth.create'));
		}

		if ( $this->auth->user()->hasRole(Role::SUBSCRIBER) )
		{
			Flash::error('You do not have the necessary authorization.');

			return redirect()->guest(route('home'));
		}

		return $next($request);
	}
}
