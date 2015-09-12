<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

namespace App\Http\Controllers\Gazzete;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;

/**
 * Class GazzeteController displays views: home
 *
 * @package App\Http\Controllers\Gazzete
 */
class GazzeteController extends Controller
{
	/**
	 * Display home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		return view('gazzete.home');
	}
}
