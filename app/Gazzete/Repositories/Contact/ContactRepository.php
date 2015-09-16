<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/9/2015
 */

namespace app\Gazzete\Repositories\Contact;


interface ContactRepository
{

	/**
	 * Store a contact.
	 *
	 * @param $data
	 * @return mixed
	 */
	public function save(array $data);
}