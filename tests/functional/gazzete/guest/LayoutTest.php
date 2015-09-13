<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class LayoutTest verifies a guest can view all content pertaining to the layout of Gazzete page '/'.
 */
class LayoutTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_sidebar()
	{
		$this->visit(route('home'))
			->seePageIs(route('home'))
			->see('<span class="menu-trigger animated fadeInDown"')
			->see('Gazzete')
			->see('DEREE News. 24/7.')
			->see('Latest story.')
			->see('Subtitle')
			->see('Join Our Newsletter');
	}

	/** @test */
	public function it_reads_panel_menu()
	{
		$this->visit(route('home'))
			->see('Home')
			->see('Contributors')
			->see('About')
			->see('Contact')
			->see('Articles')
			->see('Categories')
			->see('Tags')
			->see('Favorites');
	}

	/** @test */
	public function it_reads_footer()
	{
		$this->visit(route('home'))
			->seePageIs(route('home'))
			->see('About')
			->see('Writer 2015');
	}
}
