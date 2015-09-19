<?php

get('/', ['as' => 'home', 'uses' => 'Gazzete\GazzeteController@home']);

Route::group(['prefix' => 'api'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::resource('posts', 'Api\v1\PostsController', ['only' => ['index']]);
	});
});

Route::resource('posts', 'Gazzete\PostsController', ['only' => 'show']);
Route::resource('authors', 'Gazzete\AuthorsController', ['only' => 'show']);
Route::resource('categories', 'Gazzete\CategoriesController', ['only' => 'show']);

get('about', ['as' => 'about', 'uses' => 'Gazzete\GazzeteController@about']);
get('contact', ['as' => 'contact', 'uses' => 'Gazzete\GazzeteController@contact']);
post('contact', ['as' => 'contact.post', 'uses' => 'Gazzete\GazzeteController@postContact']);

Route::group(['prefix' => 'management'], function ()
{
	get('dashboard', ['as' => 'management.home', 'uses' => 'Management\DashboardController@home']);
	Route::resource('posts', 'Management\PostsController', ['only' => ['create', 'store', 'edit', 'update']]);
	Route::resource('contact-requests', 'Management\ContactRequestsController', ['only' => ['index']]);

	get('auth', ['as' => 'management.auth.create', 'uses' => 'Management\Auth\AuthController@getLogin']);
	post('auth', ['as' => 'management.auth.store', 'uses' => 'Management\Auth\AuthController@postLogin']);
});
