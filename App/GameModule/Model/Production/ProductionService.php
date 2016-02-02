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
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;


	function __construct(
        $speed,
        App\GameModule\Model\Building\BuildingModel $buildingModel,
        App\FrontModule\Model\OData\ODataModel $ODataModel,
		App\FrontModule\Model\VData\VDataModel $VDataModel
    ){
        $this->speed = $speed;
        $this->buildingModel = $buildingModel;
        $this->ODataModel = $ODataModel;
		$this->VDataModel = $VDataModel;
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
        foreach ($woodFields as $level) {
            /** @var \stdClass $woodcutter */
            $woodcutter = $this->buildingModel->getBuildingLevel(1, $level);
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
        foreach ($clayFields as $level) {
            /** @var \stdClass $clayPit */
            $clayPit = $this->buildingModel->getBuildingLevel(2, $level);
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
        foreach ($ironFields as $level) {
            /** @var \stdClass $ironMine */
            $ironMine = $this->buildingModel->getBuildingLevel(3, $level);
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
        foreach ($cropFields as $level) {
            /** @var \stdClass $cropland */
            $cropland = $this->buildingModel->getBuildingLevel(4, $level);
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

		// Step 7 subtract upkeep
		$production = $production - $village->getUpkeep();

        return round($production);
    }


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param int $time
	 */
	public function processProduction($village, $time)
	{
		/** @var \stdClass $VData */
		$VData = $this->VDataModel->getByWId($village->getId());

		if ($time !== $VData->lastupdate2) {
			if ($VData->lastupdate2 === 0) {
				$lastUpdate = $time;

			} else {
				$lastUpdate = $VData->lastupdate2;
			}

			$wood = $VData->wood;
			if ($VData->wood !== $VData->maxstore) {
				$productionWood = $this->getProductionWood($village);
				$producedWood = ($time - $lastUpdate) * ($productionWood / 3600);
				$totalWood = $producedWood + $VData->wood;
				if ($totalWood < $VData->maxstore) {
					$wood = $totalWood;
				} else {
					$wood = $VData->maxstore;
				}
			}
			$clay = $VData->clay;
			if ($VData->clay !== $VData->maxstore) {
				$productionClay = $this->getProductionClay($village);
				$producedClay = ($time - $lastUpdate) * ($productionClay / 3600);
				$totalClay = $producedClay + $VData->clay;
				if ($totalClay < $VData->maxstore) {
					$clay = $totalClay;
				} else {
					$clay = $VData->maxstore;
				}
			}
			$iron = $VData->iron;
			if ($VData->iron !== $VData->maxstore) {
				$productionIron = $this->getProductionIron($village);
				$producedIron = ($time - $lastUpdate) * ($productionIron / 3600);
				$totalIron = $producedIron + $VData->iron;
				if ($totalIron < $VData->maxstore) {
					$iron = $totalIron;
				} else {
					$iron = $VData->maxstore;
				}
			}
			$crop = $VData->crop;
			if ($VData->crop !== $VData->maxstore) {
				$productionCrop = $this->getProductionCrop($village);
				$producedCrop = ($time - $lastUpdate) * ($productionCrop / 3600);
				$totalCrop = $producedCrop + $VData->crop;
				if ($totalCrop < $VData->maxstore) {
					$crop = $totalCrop;
				} else {
					$crop = $VData->maxstore;
				}
			}
			$this->VDataModel->update($village->getId(), [
				'wood' => $wood,
				'clay' => $clay,
				'iron' => $iron,
				'crop' => $crop,
				'lastupdate2' => $lastUpdate,
			]);
		}
	}
}