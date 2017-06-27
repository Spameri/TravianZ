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

	public static $mapCoordinates = [
		"53, 137, 90, 157, 53, 177, 16, 157",
		"89, 117, 126, 137, 89, 157, 52, 137",
		"125, 97, 162, 117, 125, 137, 88, 117",
		"161, 77, 198, 97, 161, 117, 124, 97",
		"197, 57, 234, 77, 197, 97, 160, 77",
		"233, 37, 270, 57, 233, 77, 196, 57",
		"269, 17, 306, 37, 269, 57, 232, 37",
		"90, 157, 127, 177, 90, 197, 53, 177",
		"126, 137, 163, 157, 126, 177, 89, 157",
		"162, 117, 199, 137, 162, 157, 125, 137",
		"198, 97, 235, 117, 198, 137, 161, 117",
		"234, 77, 271, 97, 234, 117, 197, 97",
		"270, 57, 307, 77, 270, 97, 233, 77",
		"306, 37, 343, 57, 306, 77, 269, 57",
		"127, 177, 164, 197, 127, 217, 90, 197",
		"163, 157, 200, 177, 163, 197, 126, 177",
		"199, 137, 236, 157, 199, 177, 162, 157",
		"235, 117, 272, 137, 235, 157, 198, 137",
		"271, 97, 308, 117, 271, 137, 234, 117",
		"307, 77, 344, 97, 307, 117, 270, 97",
		"343, 57, 380, 77, 343, 97, 306, 77",
		"164, 197, 201, 217, 164, 237, 127, 217",
		"200, 177, 237, 197, 200, 217, 163, 197",
		"236, 157, 273, 177, 236, 197, 199, 177",
		"272, 137, 309, 157, 272, 177, 235, 157",
		"308, 117, 345, 137, 308, 157, 271, 137",
		"344, 97, 381, 117, 344, 137, 307, 117",
		"380, 77, 417, 97, 380, 117, 343, 97",
		"201, 217, 238, 237, 201, 257, 164, 237",
		"237, 197, 274, 217, 237, 237, 200, 217",
		"273, 177, 310, 197, 273, 217, 236, 197",
		"309, 157, 346, 177, 309, 197, 272, 177",
		"345, 137, 382, 157, 345, 177, 308, 157",
		"381, 117, 418, 137, 381, 157, 344, 137",
		"417, 97, 454, 117, 417, 137, 380, 117",
		"238, 237, 275, 257, 238, 277, 201, 257",
		"274, 217, 311, 237, 274, 257, 237, 237",
		"310, 197, 347, 217, 310, 237, 273, 217",
		"346, 177, 383, 197, 346, 217, 309, 197",
		"382, 157, 419, 177, 382, 197, 345, 177",
		"418, 137, 455, 157, 418, 177, 381, 157",
		"454, 117, 491, 137, 454, 157, 417, 137",
		"275, 257, 312, 277, 275, 297, 238, 277",
		"311, 237, 348, 257, 311, 277, 274, 257",
		"347, 217, 384, 237, 347, 257, 310, 237",
		"383, 197, 420, 217, 383, 237, 346, 217",
		"419, 177, 456, 197, 419, 217, 382, 197",
		"455, 157, 492, 177, 455, 197, 418, 177",
		"491, 137, 528, 157, 491, 177, 454, 157",
	];


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