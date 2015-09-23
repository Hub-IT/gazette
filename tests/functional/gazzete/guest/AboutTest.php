<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class HomeTest verifies a guest can view all content pertaining to the home page '/'.
 */
class AboutTest extends TestCase
{
	use DatabaseMigrations;

	public function it_reads_header()
	{
		$this->visit(route('about'))
			->seePageIs(route('about'))
			->see(asset('gazette/img/default-about.jpg'));
	}

	/** @test */
	public function it_reads_contents()
	{
		$this->visit(route('about'))
			->see('POSTS')
			->see('About Us')
			->see('A summary about us')
			->see('Full details about us.');
	}


	/** @test */
	public function it_reads_footer()
	{
		$this->visit(route('about'))
			->see('The writer community loves your content. Writer &copy;')
			->see('The writer community loves your content. Writer &copy; ' . date("Y") . ' <a href="' . route("home") . '">latest posts</a></p>');
	}
}