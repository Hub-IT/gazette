<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   15/9/2015
 */

namespace App\Http\ViewComposers;

use App\Gazzete\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class MasterComposer
{
	public function compose(View $view)
	{
		$view->with('user', Auth::user());
	}
}