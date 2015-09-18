<?php

namespace App\Gazzete;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'summary', 'content', 'minutes_read', 'header_background', 'slug'];

	public function assignAuthor($author)
	{
		$this->author()->associate($author);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo('App\Gazzete\User');
	}

	public function assignCategory($category)
	{
		$this->category()->associate($category);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('App\Gazzete\Category');
	}
}
