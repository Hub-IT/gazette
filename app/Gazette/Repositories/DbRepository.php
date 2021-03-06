<?php

namespace App\Gazette\Repositories;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   13/9/2015
 */
abstract class DbRepository
{
	/**
	 * Eloquent model
	 */
	protected $model;

	/**
	 * @param $model
	 */
	public function __construct($model)
	{
		$this->model = $model;
	}

	/**
	 * Fetch a record by id
	 *
	 * @param $id
	 * @return mixed
	 */
	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function count()
	{
		return $this->model->all()->count();
	}

	public function all()
	{
		return $this->model->all();
	}

	public function save(array $data)
	{
		$this->model->fill($data);

		return $this->model->save();
	}

	/**
	 * @param mixed $model
	 * @return DbRepository
	 */
	public function setModel($model)
	{
		$this->model = $model;

		return $this;
	}

	/**
	 * Destroy model from database.
	 *
	 * @param $id
	 * @return mixed
	 */
	public function destroyById($id)
	{
		return $this->model->find($id)->delete();
	}

}