<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */

/**
 * Class HomeTest verifies a guest can view all content pertaining to the home page '/'.
 */
class ContactTest extends TestCase
{
	/** @test */
	public function it_reads_contents()
	{
		$this->visit(route('contact'))
			->seePageIs(route('contact'))
			->see('Contact our Team')
			->see('Name')
			->see('Jane Doe')
			->see('Email')
			->see('example@email.com')
			->see('Phone Number')
			->see('++306912345678')
			->see('Message')
			->see('Hello, please help me with')
			->see('SEND');
	}


	/** @test */
	public function it_sends_message()
	{
		$contact = factory(App\Gazzete\Contact::class)->make();

		$this->visit(route('contact'))
			->type($contact->name, 'name')
			->type($contact->email, 'email')
			->type($contact->phone_number, 'phone_number')
			->type($contact->message, 'message')
			->press('Send')
			->seeInDatabase('contacts', [
				'name'         => $contact->name, 'email' => $contact->email,
				'phone_number' => $contact->phone_number,
				'message'      => $contact->message,
			]);
	}
}