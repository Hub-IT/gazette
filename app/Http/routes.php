<?php

get('/', ['as' => 'home', 'uses' => 'Gazzete\GazzeteController@home']);

Route::resource('posts', 'Gazzete\PostsController', ['only' => 'show']);
Route::resource('authors', 'Gazzete\AuthorsController', ['only' => 'show']);
Route::resource('categories', 'Gazzete\CategoriesController', ['only' => 'show']);


Route::group(['prefix' => 'api'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
		Route::resource('posts', 'Api\v1\PostsController', ['only' => ['index']]);
	});
});
