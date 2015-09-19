<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace tests\functional\management\admin;

use App\Gazzete\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Class ContactsTest Test CRUD operations for gazzete users contact requests.
 * @package tests\functional\management\admin
 */
class ContactsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_contacts_index()
	{
		$user = factory(\App\Gazzete\User::class)->create();
		$user->assignRole(Role::administrator());

		$this
			->actingAs($user)
			->visit(route('contacts.index'))
			->seePageIs(route('contacts.index'));

	}

}