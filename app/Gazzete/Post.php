<?php

namespace App\Gazzete;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'summary', 'content', 'minutes_read', 'slug', 'header_background'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('App\Gazzete\Category');
	}

	public function assignAuthor($author)
	{
		$this->author()->associate($author)->save();
	}

	public function assignCategory($category)
	{
		$this->category()->associate($category)->save();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo('App\Gazzete\User');
	}
}
