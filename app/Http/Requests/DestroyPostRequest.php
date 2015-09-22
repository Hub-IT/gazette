<?php

namespace App\Http\Requests;

use App\Gazzete\Models\Role;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class DestroyPostRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$user = Auth::user();

		if ( $user->hasRole(Role::SUBSCRIBER) )
		{
			Flash::error('You do not have the necessary privileges to delete a post');

			return redirect()->back();
		}

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}
}
