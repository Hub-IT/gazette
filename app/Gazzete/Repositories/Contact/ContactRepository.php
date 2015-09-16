<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/9/2015
 */

namespace app\Gazzete\Repositories\Contact;


use App\Gazzete\Contact;

interface ContactRepository
{

	/**
	 * Store a contact.
	 *
	 * @param Contact $contact
	 * @return mixed
	 */
	public function store(Contact $contact);
}