<?php

namespace App\Gazzete\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'summary', 'content', 'minutes_read', 'header_background', 'slug'];

	public function assignAuthor($author)
	{
		return $this->author()->associate($author) ? $this : false;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo('App\Gazzete\Models\User');
	}

	public function assignCategory($category)
	{
		return $this->category()->associate($category) ? $this : false;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('App\Gazzete\Models\Category');
	}
}
