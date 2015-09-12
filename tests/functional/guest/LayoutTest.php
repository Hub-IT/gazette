<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

/**
 * Class homePageTest verifies a guest can view all content pertaining to the home page '/'.
 */
class LayoutTest extends TestCase
{

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
			->seePageIs(route('home'))
			->dontSee('Home')
			->dontSee('Contributors')
			->dontSee('About')
			->dontSee('Contact')
			->dontSee('Articles')
			->dontSee('Categories')
			->dontSee('Tags')
			->dontSee('Favorites')
			->click('<span class="menu-trigger animated fadeInDown">')
			->see('Home')
			->see('Contributors')
			->see('About')
			->see('Contact')
			->see('Articles')
			->see('Categories')
			->see('Tags')
			->see('Favorites');
	}
}
