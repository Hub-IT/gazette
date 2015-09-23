<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 17/10/2015
 */
namespace tests\functional\management\admin;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Verify an account of type author is able to login
 */
class AuthTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_ui()
	{
		$this->visit(route('management.auth.create'))
			->seePageIs(route('management.auth.create'))
			->see('<a href="' . route('management.auth.create') . '"><b>Gazette</b> Management System</a>')
			->see('Sign in to gain access')
			->see('Email')
			->see('Password')
			->see('Remember Me')
			->see('Sign In');
	}
}
