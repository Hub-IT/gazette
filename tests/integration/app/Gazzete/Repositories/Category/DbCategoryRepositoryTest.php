<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace tests\integration\app\Gazzete\Repositories\Category;

use App\Gazzete\Repositories\Category\DbCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class DbCategoryRepositoryTest extends TestCase
{

	use DatabaseMigrations;

	protected $dbCategoryRepository;

	public function setUp()
	{
		parent::setUp();

		$this->dbCategoryRepository = new DbCategoryRepository();
	}

	/** @test */
	public function it_returns_all()
	{
		$expectedCategories = factory(\App\Gazzete\Models\Category::class, 2)->create();

		$actualCategories = $this->dbCategoryRepository->all();

		$this->assertCount(2, $actualCategories);
		$this->assertEquals($expectedCategories[0]->id, $actualCategories->get(0)->id);
		$this->assertEquals($expectedCategories[0]->name, $actualCategories->get(0)->name);
		$this->assertEquals($expectedCategories[1]->id, $actualCategories->get(1)->id);
		$this->assertEquals($expectedCategories[1]->name, $actualCategories->get(1)->name);
	}


}