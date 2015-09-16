<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class HomeTest verifies a guest can view all content pertaining to the home page '/'.
 */
class HomeTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_about()
	{
		$this->visit(route('about'))
			->seePageIs(route('about'))
			->see('POSTS')
			->see('About Us')
			->see('A summary about us')
			->see('Full details about us.');
	}

}