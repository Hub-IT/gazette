<?php

namespace App\Exceptions;

use App\Gazette\Models\Role;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		HttpException::class,
		ModelNotFoundException::class,
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		# Gazzete Errors
		if ( ! Auth::check() || Auth::user()->hasRole(Role::SUBSCRIBER) )
		{
			if ( $e instanceof NotFoundHttpException ) return redirect()->route('gazette.errors.404');

			if ( $e instanceof TokenMismatchException ) return redirect()->route('gazette.errors.unauthorized');
		}

		# Management Errors
		if ( $e instanceof NotFoundHttpException ) return redirect()->route('management.errors.404');

		if ( $e instanceof TokenMismatchException ) return redirect()->route('management.errors.unauthorized');

		if ( $e instanceof ModelNotFoundException ) $e = new NotFoundHttpException($e->getMessage(), $e);

		return parent::render($request, $e);
	}
}
