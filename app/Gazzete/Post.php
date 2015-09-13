<?php

namespace App\Gazzete;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'summary', 'content', 'minutes_read'];

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

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo('App\Gazzete\User');
	}
}
