<?php

namespace App\GameModule\DTO;

class Village
{
    /** @var int */
    private $id;

    /** @var int */
    private $actualWood;
    /** @var int */
    private $productionWood;

    /** @var int */
    private $actualClay;
    /** @var int */
    private $productionClay;

    /** @var int */
    private $actualIron;
    /** @var int */
    private $productionIron;

    /** @var int */
    private $actualCrop;
    /** @var int */
    private $productionCrop;

    /** @var int */
    private $storage;
    /** @var int */
    private $granary;

    /** @var int */
    private $upkeep;
    /** @var int */
    private $maxUpkeep;

    /** @var string */
    private $name;
    /** @var int */
    private $loyalty;

    /** @var bool */
    private $capital;

    /** @var int */
    private $type;

    /** @var array */
    private $fData;

    /** @var \stdClass */
    private $owner;

	/** @var int */
	private $natar;

	/** @var int */
	private $culturePoints;

	/** @var int */
	private $population;

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
    public function getActualWood()
    {
        return $this->actualWood;
    }

    /**
     * @param int $actualWood
     */
    public function setActualWood($actualWood)
    {
        $this->actualWood = $actualWood;
    }

    /**
     * @return int
     */
    public function getProductionWood()
    {
        return $this->productionWood;
    }

    /**
     * @param int $productionWood
     */
    public function setProductionWood($productionWood)
    {
        $this->productionWood = $productionWood;
    }

    /**
     * @return int
     */
    public function getActualClay()
    {
        return $this->actualClay;
    }

    /**
     * @param int $actualClay
     */
    public function setActualClay($actualClay)
    {
        $this->actualClay = $actualClay;
    }

    /**
     * @return int
     */
    public function getProductionClay()
    {
        return $this->productionClay;
    }

    /**
     * @param int $productionClay
     */
    public function setProductionClay($productionClay)
    {
        $this->productionClay = $productionClay;
    }

    /**
     * @return int
     */
    public function getActualIron()
    {
        return $this->actualIron;
    }

    /**
     * @param int $actualIron
     */
    public function setActualIron($actualIron)
    {
        $this->actualIron = $actualIron;
    }

    /**
     * @return int
     */
    public function getProductionIron()
    {
        return $this->productionIron;
    }

    /**
     * @param int $productionIron
     */
    public function setProductionIron($productionIron)
    {
        $this->productionIron = $productionIron;
    }

    /**
     * @return int
     */
    public function getActualCrop()
    {
        return $this->actualCrop;
    }

    /**
     * @param int $actualCrop
     */
    public function setActualCrop($actualCrop)
    {
        $this->actualCrop = $actualCrop;
    }

    /**
     * @return int
     */
    public function getProductionCrop()
    {
        return $this->productionCrop;
    }

    /**
     * @param int $productionCrop
     */
    public function setProductionCrop($productionCrop)
    {
        $this->productionCrop = $productionCrop;
    }

    /**
     * @return int
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param int $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return int
     */
    public function getGranary()
    {
        return $this->granary;
    }

    /**
     * @param int $granary
     */
    public function setGranary($granary)
    {
        $this->granary = $granary;
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
    public function getMaxUpkeep()
    {
        return $this->maxUpkeep;
    }

    /**
     * @param int $maxUpkeep
     */
    public function setMaxUpkeep($maxUpkeep)
    {
        $this->maxUpkeep = $maxUpkeep;
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

    /**
     * @return int
     */
    public function getLoyalty()
    {
        return $this->loyalty;
    }

    /**
     * @param int $loyalty
     */
    public function setLoyalty($loyalty)
    {
        $this->loyalty = $loyalty;
    }

    /**
     * @return boolean
     */
    public function isCapital()
    {
        return $this->capital;
    }

    /**
     * @param boolean $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
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
     * @return array
     */
    public function getFData()
    {
        return $this->fData;
    }

    /**
     * @param array $fData
     */
    public function setFData($fData)
    {
        $this->fData = $fData;
    }

    /**
     * @return \stdClass
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param \stdClass $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }


	/**
	 * @return int
	 */
	public function getNatar()
	{
		return $this->natar;
	}


	/**
	 * @param int $natar
	 */
	public function setNatar($natar)
	{
		$this->natar = $natar;
	}


	/**
	 * @return int
	 */
	public function getCulturePoints()
	{
		return $this->culturePoints;
	}


	/**
	 * @param int $culturePoints
	 */
	public function setCulturePoints($culturePoints)
	{
		$this->culturePoints = $culturePoints;
	}


	/**
	 * @return int
	 */
	public function getPopulation()
	{
		return $this->population;
	}


	/**
	 * @param int $population
	 */
	public function setPopulation($population)
	{
		$this->population = $population;
	}
}