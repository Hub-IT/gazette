<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Gazzete\Repositories\Post\PostRepository',
			'App\Gazzete\Repositories\Post\DbPostRepository');

		$this->app->bind('App\Gazzete\Repositories\Category\CategoryRepository',
			'App\Gazzete\Repositories\Category\DbCategoryRepository');

		$this->app->bind('App\Gazzete\Repositories\Contact\ContactRepository',
			'App\Gazzete\Repositories\Contact\DbContactRepository');
	}
}
