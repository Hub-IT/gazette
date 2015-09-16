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
	get('dashboard', ['as' => 'management.dashboard.home', 'uses' => 'Management\DashboardController@home']);
});
