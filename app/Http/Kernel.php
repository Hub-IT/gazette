<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
		\App\Http\Middleware\EncryptCookies::class,
		\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
		\Illuminate\Session\Middleware\StartSession::class,
		\Illuminate\View\Middleware\ShareErrorsFromSession::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'management.auth'               => \App\Http\Middleware\AuthenticateManagement::class,
		'management.auth.administrator' => \App\Http\Middleware\AuthenticateManagementAdministrator::class,
		'management.auth.author'        => \App\Http\Middleware\AuthenticateManagementAuthor::class,
		'auth.basic'                    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'management.guest'              => \App\Http\Middleware\RedirectIfManagementAuthenticated::class,
	];
}
