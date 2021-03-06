<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/9/2015
 */

namespace tests\integration\app\Gazette\Repositories\Contact;

use App\Gazette\Repositories\Contact\DbContactRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

class DbContactRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	protected $dbContactRepository;

	public function setUp()
	{
		parent::setUp();

		$this->dbContactRepository = new DbContactRepository();
	}

	/** @test */
	public function it_saves_contact()
	{
		$expectedContact = factory(\App\Gazette\Models\ContactRequest::class)->make();

		$this->dbContactRepository->save($expectedContact->toArray());

		$this->seeInDatabase('contact_requests', ['name'         => $expectedContact->name,
		                                          'email'        => $expectedContact->email,
		                                          'phone_number' => $expectedContact->phone_number,
		                                          'message'      => $expectedContact->message]);
	}
}