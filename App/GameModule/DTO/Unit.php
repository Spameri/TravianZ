<?php

namespace App\GameModule\DTO;



class Unit
{
	/** @var int */
	private $id;
	/** @var string */
	private $name;
	/** @var int */
	private $attack;
	/** @var int */
	private $defenceInfantry;
	/** @var int */
	private $defenceCalvary;
	/** @var int */
	private $wood;
	/** @var int */
	private $clay;
	/** @var int */
	private $iron;
	/** @var int */
	private $crop;
	/** @var int */
	private $upkeep;
	/** @var int */
	private $speed;
	/** @var int */
	private $time;
	/** @var int */
	private $capacity;
	/** @var int */
	private $type;
	/** @var int */
	private $tribe;


	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}


	/**
	 * @return int
	 */
	public function getAttack()
	{
		return $this->attack;
	}


	/**
	 * @param int $attack
	 */
	public function setAttack($attack)
	{
		$this->attack = $attack;
	}


	/**
	 * @return int
	 */
	public function getDefenceInfantry()
	{
		return $this->defenceInfantry;
	}


	/**
	 * @param int $defenceInfantry
	 */
	public function setDefenceInfantry($defenceInfantry)
	{
		$this->defenceInfantry = $defenceInfantry;
	}


	/**
	 * @return int
	 */
	public function getDefenceCalvary()
	{
		return $this->defenceCalvary;
	}


	/**
	 * @param int $defenceCalvary
	 */
	public function setDefenceCalvary($defenceCalvary)
	{
		$this->defenceCalvary = $defenceCalvary;
	}


	/**
	 * @return int
	 */
	public function getWood()
	{
		return $this->wood;
	}


	/**
	 * @param int $wood
	 */
	public function setWood($wood)
	{
		$this->wood = $wood;
	}


	/**
	 * @return int
	 */
	public function getClay()
	{
		return $this->clay;
	}


	/**
	 * @param int $clay
	 */
	public function setClay($clay)
	{
		$this->clay = $clay;
	}


	/**
	 * @return int
	 */
	public function getIron()
	{
		return $this->iron;
	}


	/**
	 * @param int $iron
	 */
	public function setIron($iron)
	{
		$this->iron = $iron;
	}


	/**
	 * @return int
	 */
	public function getCrop()
	{
		return $this->crop;
	}


	/**
	 * @param int $crop
	 */
	public function setCrop($crop)
	{
		$this->crop = $crop;
	}


	/**
	 * @return int
	 */
	public function getUpkeep()
	{
		return $this->upkeep;
	}


	/**
	 * @param int $upkeep
	 */
	public function setUpkeep($upkeep)
	{
		$this->upkeep = $upkeep;
	}


	/**
	 * @return int
	 */
	public function getSpeed()
	{
		return $this->speed;
	}


	/**
	 * @param int $speed
	 */
	public function setSpeed($speed)
	{
		$this->speed = $speed;
	}


	/**
	 * @return int
	 */
	public function getCapacity()
	{
		return $this->capacity;
	}


	/**
	 * @param int $capacity
	 */
	public function setCapacity($capacity)
	{
		$this->capacity = $capacity;
	}


	/**
	 * @return int
	 */
	public function getType()
	{
		return $this->type;
	}


	/**
	 * @param int $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}


	/**
	 * @return int
	 */
	public function getTribe()
	{
		return $this->tribe;
	}


	/**
	 * @param int $tribe
	 */
	public function setTribe($tribe)
	{
		$this->tribe = $tribe;
	}


	/**
	 * @return int
	 */
	public function getTime()
	{
		return $this->time;
	}


	/**
	 * @param int $time
	 */
	public function setTime($time)
	{
		$this->time = $time;
	}


	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}


	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

}