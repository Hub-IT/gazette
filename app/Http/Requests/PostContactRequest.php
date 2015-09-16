<?php

namespace App\Http\Requests;

class PostContactRequest extends Request
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
			'name'         => 'required',
			'email'        => 'required|email',
			'phone_number' => 'min:10',
			'message'      => 'required|min:3',
		];
	}
}
