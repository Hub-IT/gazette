<?php

namespace App\Gazzete;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'subtitle', 'content'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo('App\Gazzete\User');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('App\Gazzete\Category');
	}
}
