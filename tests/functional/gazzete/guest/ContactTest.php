<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
}