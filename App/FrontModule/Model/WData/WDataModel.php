<?php

namespace App\FrontModule\Model\WData;

use App;
use Dibi;
use Nette;

class WDataModel extends App\Model\BaseModel
{
	protected $table = 'wdata';
	/** @var int */
	private $worldSize;


	public function __construct(
		$worldSize,
		Dibi\Connection $database
	) {
		parent::__construct($database);
		$this->worldSize = $worldSize;
	}


	/**
	 * @param int $x
	 * @param int $y
	 * @return \Dibi\Row|FALSE
	 */
	public function getByCoordinates($x, $y)
	{
		return $this->database->select('*')->from($this->table)
			->where('x = %i', $x)
			->where('y = %i', $y)
			->fetch();
	}

	public function setFieldTaken($id)
	{
		$this->database->update($this->table, [
			'occupied' => 1
		])
			->where('id = %i', $id)
			->execute();
		return $id;
	}


	/**
	 * @return array
	 */
	public function getAllOases()
	{
		return $this->database->select('*')->from($this->table)
			->where('oasistype > 0')
			->fetchAll();
	}

	public function getRandom($where)
	{
		$query = $this->database->select('*')->from($this->table);
		$query->where('fieldtype = 3');
		$query->where('occupied IS NULL');
		switch ($where) {
			case 1:
				$query->where('x < -1 AND x > %i', -$this->worldSize);
				$query->where('y > 1 and y < %i', $this->worldSize); //x- y+
				break;
			case 2:
				$query->where('x > 1 and x < %i', $this->worldSize);
				$query->where('y > 1 and y < %i', $this->worldSize);
				break;
			case 3:
				$query->where('x < -1 and x > %i', -$this->worldSize);
				$query->where('y < -1 and y > %i', -$this->worldSize);
				break;
			case 4:
				$query->where('x > 1 and x < %i', $this->worldSize);
				$query->where('y < -1 and y > %i', -$this->worldSize);
				break;
		}
		$query->orderBy('RAND()');
		return $query->fetch();
	}
}