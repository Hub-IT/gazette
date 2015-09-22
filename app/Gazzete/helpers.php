<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   22/9/2015
 */


/**
 * @param array $routes
 * @param string $active
 * @return string|void
 */
function activate($routes = [], $active = 'active')
{
	foreach ($routes as $route)
	{
		if ( Route::is($route) ) return $active;
	}

	return;
}