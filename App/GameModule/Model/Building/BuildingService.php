<?php

namespace App\GameModule\Model\Building;

use App;

class BuildingService
{
    /**
     * @var BuildingModel
     */
    private $buildingModel;
    /** @var int */
    private $speed;


    public function __construct(
        $speed,
        BuildingModel $buildingModel
    ) {
        $this->buildingModel = $buildingModel;
        $this->speed = $speed;
    }

    public function getBuilding($id, $level)
    {
        /** @var \stdClass $buildingData */
        $buildingData = $this->buildingModel->get($id);
        /** @var \stdClass $levelData */
        $levelData = $this->buildingModel->getBuildingLevel($id, $level);
        $building = new App\GameModule\DTO\Building();

        $building->setName($buildingData->name);
        $building->setDescription($buildingData->description);

        $building->setLevel($levelData->level);
        $building->setProduction($levelData->production * $this->speed);

        $building->setBuilding($buildingData->id);

        $building->setWood($levelData->wood);
        $building->setClay($levelData->clay);
        $building->setIron($levelData->iron);
        $building->setCrop($levelData->crop);
        $building->setUpkeep($levelData->pop);
        $building->setTime($levelData->time);

        return $building;
    }
}