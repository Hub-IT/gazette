<?php

namespace App\Gazzete\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	const ADMINISTRATOR = 'administrator'; # access to all features of below roles, as well editing account users
	const EDITOR = 'editor'; # publish and manage posts including the posts of other users.
	const AUTHOR = 'author'; # publish and manage their own posts.
	const CONTRIBUTOR = 'contributor'; # write and manage their own posts but cannot publish them.
	const SUBSCRIBER = 'subscriber';# only manage their profile, upvoting, and commenting on posts.

	protected $fillable = ['name'];


	/**
	 * @return mixed
	 */
	public static function administrator()
	{
		return Role::where('name', '=', Role::ADMINISTRATOR)->first();
	}

	/**
	 * @return mixed
	 */
	public static function editor()
	{
		return Role::where('name', '=', Role::EDITOR)->first();
	}

	/**
	 * @return mixed
	 */
	public static function author()
	{
		return Role::where('name', '=', Role::AUTHOR)->first();
	}

	/**
	 * @return mixed
	 */
	public static function contributor()
	{
		return Role::where('name', '=', Role::CONTRIBUTOR)->first();
	}

	public static function subscriber()
	{
		return Role::where('name', '=', Role::SUBSCRIBER)->first();
	}
}
