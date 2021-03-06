<?php

namespace App\FrontModule\Model\VData;

use App;
use Dibi;

class VDataModel extends App\Model\BaseModel
{
	protected $table = 'vdata';

	/** @var int */
	private $storageCapacity;
	/** @var int */
	private $storageMultiplier;


	public function __construct(
		$storageCapacity,
		$storageMultiplier,
		Dibi\Connection $database
	) {
		$this->storageCapacity = $storageCapacity;
		$this->storageMultiplier = $storageMultiplier;
		parent::__construct($database);
	}


	public function getByWId($wid)
	{
		return $this->database->select('*')->from($this->table)
			->where('wref = %i', $wid)
			->fetch();
	}


	/**
	 * @param int $user
	 * @return \Dibi\Row|FALSE
	 */
	public function getByUser($user)
	{
		return $this->database->select('*')->from($this->table)
			->where('owner = %i', $user)
			->fetch();
	}

	/**
	 * @param int $user
	 * @return array
	 */
	public function getAllByUser($user)
	{
		return $this->database->select('*')->from($this->table)
			->where('owner = %i', $user)
			->fetchAll();
	}


	/**
	 * @param int $user
	 * @return int|FALSE
	 */
	public function countByUser($user)
	{
		return $this->database->select('count(wref)')->from($this->table)
			->where('owner = %i', $user)
			->fetchSingle();
	}


	/**
	 * @param \stdClass $user
	 * @param \stdClass $field
	 * @param string $villageName
	 * @return bool
	 */
	public function addVillageForUser($user, $field, $villageName)
	{
		$this->database->insert($this->table, [
			'wref'     => $field->id,
			'owner'    => $user->id,
			'name'     => $villageName,
			'capital'  => $this->countByUser($user->id) === 1 ? TRUE : FALSE,
			'type'	   => $field->fieldtype,
			'pop'      => 2,
			'cp'       => 1,
			'wood'     => 750,
			'clay'     => 750,
			'iron'     => 750,
			'crop'     => 750,
			'maxstore' => $this->storageCapacity * $this->storageMultiplier,
			'maxcrop'  => $this->storageCapacity * $this->storageMultiplier,
		])->execute();

		return $field->id;
	}


	public function update($id, $data)
	{
		return $this->database->update($this->table, $data)
			->where('wref = %i', $id)
			->execute();
	}


	public function getAllIds()
	{
		return $this->database->select('wref')->from($this->table)
			->fetchAll();
	}
}