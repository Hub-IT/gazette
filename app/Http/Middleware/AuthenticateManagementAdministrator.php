<?php

namespace App\Http\Middleware;

use App\Gazzete\Role;
use Closure;

class AuthenticateManagementAdministrator
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( ! $this->auth->user()->hasRole(Role::administrator()) ) return response('Unauthorized.', 401);

		return $next($request);
	}
}
