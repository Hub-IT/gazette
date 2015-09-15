<?php

namespace App\Gazzete;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	const ADMINISTRATOR = 'admin';
	const AUTHOR = 'author';
	const EDITOR = 'editor';

	protected $fillable = ['name'];

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
	public static function administrator()
	{
		return Role::where('name', '=', Role::ADMINISTRATOR)->first();
	}
}
