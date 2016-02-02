<?php

namespace App\GameModule\DTO;

class Building
{
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var int */
    private $production;
    /** @var int */
    private $level;
    /** @var int */
    private $building;
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
    private $time;
	/** @var int */
	private $parameter;

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

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * @param int $production
     */
    public function setProduction($production)
    {
        $this->production = $production;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param int $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
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
	 * @return int
	 */
	public function getParameter()
	{
		return $this->parameter;
	}


	/**
	 * @param int $parameter
	 */
	public function setParameter($parameter)
	{
		$this->parameter = $parameter;
	}

}