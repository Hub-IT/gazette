<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

/**
 * Class ExampleTest
 */
class LandingPageTest extends TestCase
{
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$this->visit('/')
			->see('Laravel 5');
	}
}
