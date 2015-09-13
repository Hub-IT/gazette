<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
namespace App\Gazzete\Transformers;

class PostTransformer extends Transformer
{

	/**
	 * @param $item
	 * @return mixed
	 */
	public function transform($item)
	{
		return [
			'title'        => $item->title,
			'summary'      => $item->summary,
			'content'      => $item->content,
			'minutes_read' => $item->minutes_read,
		];
	}
}