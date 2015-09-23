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
		$this->app->bind('App\Gazette\Repositories\Post\PostRepository',
			'App\Gazette\Repositories\Post\DbPostRepository');

		$this->app->bind('App\Gazette\Repositories\Category\CategoryRepository',
			'App\Gazette\Repositories\Category\DbCategoryRepository');

		$this->app->bind('App\Gazette\Repositories\Contact\ContactRepository',
			'App\Gazette\Repositories\Contact\DbContactRepository');
	}
}
