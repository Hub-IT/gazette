<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   15/9/2015
 */

namespace App\Http\ViewComposers;

use App\Gazzete\User;
use Illuminate\Contracts\View\View;

class MasterComposer
{
	public function compose(View $view)
	{
		$user = new User;
		$user->avatar = "http://dummyimage.com/300.png/09f/fff";
		$view->with('user', $user);
	}
}