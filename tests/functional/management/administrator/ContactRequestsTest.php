<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/9/2015
 */

namespace tests\functional\management\administrator;

use App\Gazette\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Class ContactRequestsTest Test CRUD operations for gazette users contact requests.
 *
 * @package tests\functional\management\admin
 */
class ContactRequestsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_contacts_index()
	{
		$contactRequest = factory(\App\Gazette\Models\ContactRequest::class)->create();
		$user = factory(\App\Gazette\Models\User::class)->create();
		$user->assignRole(Role::administrator());

		# Access through sidebar
		$this->actingAs($user)
			->visit(route('management.home'))
			->click('contact-requests-index')
			->seePageIs(route('management.contact-requests.index'))
			->see('All Contact Requests')
			->see('Name')
			->see($contactRequest->name)
			->see('Email')
			->see($contactRequest->email)
			->see('Phone Number')
			->see($contactRequest->phone_number)
			->see('Peek')
			->see(substr($contactRequest->message, 0, 23))
			->see('Viewed')
			->see('<i class="fa fa-eye-slash"></i>')
			->see('Actions')
			->see(link_to_route('management.contact-requests.show', 'Show', $contactRequest, ["class" => "btn btn-primary"]))
			->see('<form method="POST" action="' . route("management.contact-requests.destroy", $contactRequest) . '" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">');

	}

}