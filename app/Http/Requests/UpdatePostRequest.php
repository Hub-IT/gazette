<?php

namespace App\Http\Requests;

class UpdatePostRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'             => 'required|unique:posts|min:1',
			'category_id'       => 'required|exists:categories,id',
			'summary'           => 'required|min:3',
			'content'           => 'required|min:10',
			'minutes_read'      => 'numeric',
			'header_background' => 'url',
		];
	}
}
