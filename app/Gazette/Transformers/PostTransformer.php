<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
namespace App\Gazette\Transformers;

class PostTransformer extends Transformer
{

	/**
	 * @param $post
	 * @return mixed
	 */
	public function transform($post)
	{
		return [
			'id'           => $post->id,
			'title'        => $post->title,
			'summary'      => $post->summary,
			'content'      => $post->content,
			'minutes_read' => $post->minutes_read,
			'author'       => [
				'id'     => $post->author->id,
				'name'   => $post->author->name,
				'avatar' => $post->author->avatar,
			],
			'category'     => [
				'id'   => $post->category->id,
				'name' => $post->category->name,
			],
		];
	}
}