<?php

get('/', ['as' => 'home', 'uses' => 'Gazzete\GazzeteController@home']);

Route::resource('posts', 'Gazzetee\PostsController', ['only' => '']);
Route::resource('authors', 'Gazzetee\AuthorsController', ['only' => '']);
Route::resource('categories', 'Gazzetee\CategoriesController', ['only' => '']);
