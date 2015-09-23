<?php

namespace App\Http\Middleware;

use App\Gazette\Role;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateManagementAuthor
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
		if ( ! $this->auth->user()->hasRole(Role::author()) ) return response('Unauthorized.', 401);

		if ( $this->auth->guest() )
		{
			if ( $request->ajax() ) return response('Unauthorized.', 401);

			return redirect()->guest(route('management.auth.create'));
		}

		return $next($request);
	}
}
