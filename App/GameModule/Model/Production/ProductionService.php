<?php

namespace App\GameModule\Model\Production;

use App;

class ProductionService
{
    /** @var int */
    private $speed;
    /**
     * @var App\GameModule\Model\Building\BuildingModel
     */
    private $buildingModel;
    /**
     * @var App\FrontModule\Model\OData\ODataModel
     */
    private $ODataModel;

    function __construct(
        $speed,
        App\GameModule\Model\Building\BuildingModel $buildingModel,
        App\FrontModule\Model\OData\ODataModel $ODataModel
    ){
        $this->speed = $speed;
        $this->buildingModel = $buildingModel;
        $this->ODataModel = $ODataModel;
    }

    /**
     * @param App\GameModule\DTO\Village $village
     * @return int
     */
    public function getProductionWood($village)
    {
        $production = 0;
        $FData = $village->getFData();
        $sawmill = FALSE;
        $woodFields = [];
        // Step 1 find fields
        for( $i = 1; $i <= 38; $i++) {
            if ($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::WOODCUTTER) {
                $woodFields[] = $FData['f' . $i];
            }
            if($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::SAWMILL) {
                $sawmill = $FData['f' . $i];
            }
        }
        // Step 2 calculate raw production
        foreach ($woodFields as $field) {
            /** @var \stdClass $woodcutter */
            $woodcutter = $this->buildingModel->getBuildingLevel(1, isset($FData[$field]) ? $FData[$field] : 0);
            $production += $woodcutter->production;
        }

        // Step 3 apply oasis
        $production = $production * (1 + (0.25 * $this->ODataModel->countByUserVillage($village->getOwner()->id, $village->getId(), App\FrontModule\Model\OData\ODataModel::MODE_WOOD)));

        // Step 4 apply sawmill
        if($sawmill) {
            /** @var \stdClass $sawmill */
            $sawmill = $this->buildingModel->getBuildingLevel(App\GameModule\Model\Building\BuildingModel::SAWMILL, $sawmill);
            $production = $production * ($sawmill->attribute / 100 + 1);
        }

        // Step 5 apply bonus production
        if ($village->getOwner()->b1 === 1) {
            $production = $production * 1.25;
        }

        // Step 6 apply speed
        $production = $production * $this->speed;

        return round($production);
    }


    /**
     * @param App\GameModule\DTO\Village $village
     * @return int
     */
    public function getProductionClay($village)
    {
        $production = 0;
        $FData = $village->getFData();
        $brick = FALSE;
        $clayFields = [];
        // Step 1 find fields
        for( $i = 1; $i <= 38; $i++) {
            if ($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::CLAY_PIT) {
                $clayFields[] = $FData['f' . $i];
            }
            if($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::BRICK) {
                $brick = $FData['f' . $i];
            }
        }
        // Step 2 calculate raw production
        foreach ($clayFields as $field) {
            /** @var \stdClass $clayPit */
            $clayPit = $this->buildingModel->getBuildingLevel(2, isset($FData[$field]) ? $FData[$field] : 0);
            $production += $clayPit->production;
        }

        // Step 3 apply oasis
        $production = $production * (1 + (0.25 * $this->ODataModel->countByUserVillage($village->getOwner()->id, $village->getId(), App\FrontModule\Model\OData\ODataModel::MODE_CLAY)));

        // Step 4 apply brick
        if($brick) {
            /** @var \stdClass $brick */
            $brick = $this->buildingModel->getBuildingLevel(App\GameModule\Model\Building\BuildingModel::BRICK, $brick);
            $production = $production * ($brick->attribute / 100 + 1);
        }

        // Step 5 apply bonus production
        if ($village->getOwner()->b2 === 1) {
            $production = $production * 1.25;
        }

        // Step 6 apply speed
        $production = $production * $this->speed;

        return round($production);
    }

    /**
     * @param App\GameModule\DTO\Village $village
     * @return int
     */
    public function getProductionIron($village)
    {
        $production = 0;
        $FData = $village->getFData();
        $foundry = FALSE;
        $ironFields = [];
        // Step 1 find fields
        for( $i = 1; $i <= 38; $i++) {
            if ($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::IRON_MINE) {
                $ironFields[] = $FData['f' . $i];
            }
            if($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::FOUNDRY) {
                $foundry = $FData['f' . $i];
            }
        }
        // Step 2 calculate raw production
        foreach ($ironFields as $field) {
            /** @var \stdClass $ironMine */
            $ironMine = $this->buildingModel->getBuildingLevel(3, isset($FData[$field]) ? $FData[$field] : 0);
            $production += $ironMine->production;
        }

        // Step 3 apply oasis
        $production = $production * (1 + (0.25 * $this->ODataModel->countByUserVillage($village->getOwner()->id, $village->getId(), App\FrontModule\Model\OData\ODataModel::MODE_IRON)));

        // Step 4 apply foundry
        if($foundry) {
            /** @var \stdClass $foundry */
            $foundry = $this->buildingModel->getBuildingLevel(App\GameModule\Model\Building\BuildingModel::FOUNDRY, $foundry);
            $production = $production * ($foundry->attribute / 100 + 1);
        }

        // Step 5 apply bonus production
        if ($village->getOwner()->b3 === 1) {
            $production = $production * 1.25;
        }

        // Step 6 apply speed
        $production = $production * $this->speed;

        return round($production);
    }


    /**
     * @param App\GameModule\DTO\Village $village
     * @return int
     */
    public function getProductionCrop($village)
    {
        $production = 0;
        $FData = $village->getFData();
        $grainMill = FALSE;
        $bakery = FALSE;
        $cropFields = [];
        // Step 1 find fields
        for( $i = 1; $i <= 38; $i++) {
            if ($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::CROPLAND) {
                $cropFields[] = $FData['f' . $i];
            }
            if($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::GRAIN_MILL) {
                $grainMill = $FData['f' . $i];
            }
            if($FData['f' . $i . 't'] === App\GameModule\Model\Building\BuildingModel::BAKERY) {
                $bakery = $FData['f' . $i];
            }
        }
        // Step 2 calculate raw production
        foreach ($cropFields as $field) {
            /** @var \stdClass $cropland */
            $cropland = $this->buildingModel->getBuildingLevel(4, isset($FData[$field]) ? $FData[$field] : 0);
            $production += $cropland->production;
        }

        // Step 3 apply oasis
        $production = $production * (
                1 +
                (0.25 * $this->ODataModel->countByUserVillage($village->getOwner()->id, $village->getId(), App\FrontModule\Model\OData\ODataModel::MODE_CROP))
                +
                (0.50 * $this->ODataModel->countByUserVillage($village->getOwner()->id, $village->getId(), App\FrontModule\Model\OData\ODataModel::MODE_CROP_BIG)));

        // Step 4 apply grainMill and bakery
        if($grainMill) {
            /** @var \stdClass $grainMill */
            $grainMill = $this->buildingModel->getBuildingLevel(App\GameModule\Model\Building\BuildingModel::GRAIN_MILL, $grainMill);
            $production = $production * ($grainMill->attribute / 100 + 1);
        }
        if ($bakery) {
            /** @var \stdClass $bakery */
            $bakery = $this->buildingModel->getBuildingLevel(App\GameModule\Model\Building\BuildingModel::BAKERY, $bakery);
            $production = $production * ($bakery->attribute / 100 + 1);
        }

        // Step 5 apply bonus production
        if ($village->getOwner()->b4 === 1) {
            $production = $production * 1.25;
        }

        // Step 6 apply speed
        $production = $production * $this->speed;

        return round($production);
    }
}