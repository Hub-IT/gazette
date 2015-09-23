<?php

get('/', ['as' => 'home', 'uses' => 'Gazette\GazetteController@home']);

Route::group(['prefix' => 'api'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::resource('posts', 'Api\v1\PostsController', ['only' => ['index']]);
	});
});

Route::resource('posts', 'Gazette\PostsController', ['only' => 'show']);
Route::resource('authors', 'Gazette\AuthorsController', ['only' => 'show']);
Route::resource('categories', 'Gazette\CategoriesController', ['only' => 'show']);

get('about', ['as' => 'about', 'uses' => 'Gazette\GazetteController@about']);
get('contact', ['as' => 'contact', 'uses' => 'Gazette\GazetteController@contact']);
post('contact', ['as' => 'contact.post', 'uses' => 'Gazette\GazetteController@postContact']);

# Errors
get('404', ['as' => 'gazette.errors.404', 'uses' => 'Management\ErrorsController@notFound']);
get('unauthorized', ['as' => 'gazette.errors.unauthorized', 'uses' => 'Gazette\ErrorsController@unauthorized']);

# Management System
Route::group(['prefix' => 'management'], function ()
{
	get('dashboard', ['as' => 'management.home', 'uses' => 'Management\DashboardController@home']);
	Route::resource('posts', 'Management\PostsController', ['except' => ['show']]);
	Route::resource('contact-requests', 'Management\ContactRequestsController', ['only' => ['index', 'show', 'destroy']]);

	get('auth', ['as' => 'management.auth.create', 'uses' => 'Management\Auth\AuthController@getLogin']);
	post('auth', ['as' => 'management.auth.store', 'uses' => 'Management\Auth\AuthController@postLogin']);

	# Errors
	get('404', ['as' => 'management.errors.404', 'uses' => 'Management\ErrorsController@notFound']);
	get('unauthorized', ['as' => 'management.errors.unauthorized', 'uses' => 'Management\ErrorsController@unauthorized']);
});
