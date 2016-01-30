<?php

namespace App\GameModule\DTO;

class Village
{
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

}