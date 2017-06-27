<?php

namespace App\Model;

use Dibi;

abstract class BaseModel
{
	/**
	 * @var string
	 */
	protected $table;

	/**
	 * @var Dibi\Connection
	 */
	protected $database;


	public function __construct(
		Dibi\Connection $database
	) {
		$this->database = $database;
	}


	/**
	 * @param array $data
	 * @return int
	 */
	public function add($data)
	{
		$this->database->insert($this->table, $data)
			->execute();
		try {
			return $this->database->insertId;
		} catch (Dibi\Exception $e) {
			return NULL;
		}
	}


	/**
	 * @param int $id
	 * @return Dibi\Row|FALSE
	 */
	public function get($id)
	{
		return $this->database->select('*')->from($this->table)
			->where('id = %i', $id)
			->fetch();
	}


	/**
	 * @param int $id
	 * @param array $data
	 * @return Dibi\Result|int
	 */
	public function update($id, $data)
	{
		return $this->database->update($this->table, $data)
			->where('id = %i', $id)
			->execute();
	}


	/**
	 * @param int $id
	 * @return Dibi\Result|int
	 */
	public function delete($id)
	{
		return $this->database->delete($this->table)
			->where('id = %i', $id)
			->execute();
	}

	public function getMapData($xMax, $xMin, $yMax, $yMin)
	{
		return $this->database->select('*')->from($this->table)
			->where('x <= %i', $xMax)
			->where('x >= %i', $xMin)
			->where('y <= %i', $yMax)
			->where('y >= %i', $yMin)
			->fetchAll();
	}
}