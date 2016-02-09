<?php

namespace App\GameModule\Model\Building;

use App;
use Kdyby;

class BuildingService
{
    /**
     * @var BuildingModel
     */
    private $buildingModel;
    /** @var int */
    private $speed;
	/** @var int */
	private $storageMultiplier;
	/**
	 * @var App\GameModule\Model\BData\BDataModel
	 */
	private $BDataModel;
	/**
	 * @var App\FrontModule\Model\FData\FDataModel
	 */
	private $FDataModel;
	/**
	 * @var App\GameModule\Model\Production\ProductionService
	 */
	private $productionService;
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;
	/**
	 * @var Kdyby\Clock\IDateTimeProvider
	 */
	private $dateTimeProvider;


	public function __construct(
        $speed,
		$storageMultiplier,
        BuildingModel $buildingModel,
		App\GameModule\Model\BData\BDataModel $BDataModel,
		App\FrontModule\Model\FData\FDataModel $FDataModel,
		App\GameModule\Model\Production\ProductionService $productionService,
		App\FrontModule\Model\VData\VillageService $villageService,
		App\FrontModule\Model\VData\VDataModel $VDataModel,
		Kdyby\Clock\IDateTimeProvider $dateTimeProvider
    ) {
        $this->buildingModel = $buildingModel;
        $this->speed = $speed;
		$this->BDataModel = $BDataModel;
		$this->FDataModel = $FDataModel;
		$this->productionService = $productionService;
		$this->villageService = $villageService;
		$this->VDataModel = $VDataModel;
		$this->dateTimeProvider = $dateTimeProvider;
		$this->storageMultiplier = $storageMultiplier;
	}


	/**
	 * @param int $id
	 * @param int $level
	 * @param App\GameModule\DTO\Village|bool $village
	 * @return App\GameModule\DTO\Building|bool
	 */
	public function getBuilding($id, $level, $village = FALSE)
    {
        /** @var \stdClass $buildingData */
        $buildingData = $this->buildingModel->get($id);
        /** @var \stdClass $levelData */
        $levelData = $this->buildingModel->getBuildingLevel($id, $level);
		if ($levelData) {
			$building = new App\GameModule\DTO\Building();

			$building->setName($buildingData->name);
			$building->setDescription($buildingData->description);

			$building->setLevel($levelData->level);
			$building->setProduction($levelData->production * $this->speed);
			$building->setParameter($levelData->parameter);
			$building->setCulturePoints($levelData->culturepoints);

			$building->setBuilding($buildingData->id);

			$building->setWood($levelData->wood);
			$building->setClay($levelData->clay);
			$building->setIron($levelData->iron);
			$building->setCrop($levelData->crop);
			$building->setUpkeep($levelData->pop);

			$time = $levelData->time / $this->speed;
			if ($village) {
				$time = $time * $this->getMainBuildingSpeed($village);
			}
			$building->setTime(round($time));

		} else {
			$building = FALSE;
		}

        return $building;
    }


	public function processBuildings($time)
	{
		$buildings = $this->BDataModel->getBuilt($time);

		foreach ($buildings as $building) {
			$data = [];
			$village = $this->villageService->getVillage($building->wid);
			$buildingStats = $this->getBuilding($building->type, $building->level, $village);
			$this->FDataModel->update($building->wid, [
				'f' . $building->field => $building->level,
				'f' . $building->field . 't' => $building->type,
			]);
			$data['pop'] = $village->getUpkeep() + $buildingStats->getUpkeep();
			$data['cp'] = $village->getCulturePoints() + $buildingStats->getCulturePoints();
			switch ($buildingStats->getBuilding()) {
				case BuildingModel::WAREHOUSE:
					$data['maxstore'] = ($this->storageMultiplier * $buildingStats->getParameter());
					break;
				case BuildingModel::GRANARY:
					$data['maxcrop'] = ($this->storageMultiplier * $buildingStats->getParameter());
					break;
			}
			$this->VDataModel->update($village->getId(), $data);
			$this->BDataModel->delete($building->id);
		}
	}


	public function build($vid, $field, $building, $level)
	{
		$village = $this->villageService->getVillage($vid);
		$next = $this->getBuilding($building, $level, $village);
		if ($this->isThereEnoughResources($next, $village)) {
			if ($village->getOwner()->tribe === 1) {
				if ($next->getBuilding() < 5) {
					if ($time = $this->BDataModel->getLastOuterBuildTime($village->getId())) {
						$time += $next->getTime();
					} else {
						/** @var int $now */
						$now = $this->dateTimeProvider->getDateTime()->format('U');
						$time = ($next->getTime() + $now);
					}
				} elseif ($next->getBuilding() > 4) {
					if ($time = $this->BDataModel->getLastInnerBuildTime($village->getId())) {
						$time += $next->getTime();
					} else {
						/** @var int $now */
						$now = $this->dateTimeProvider->getDateTime()->format('U');
						$time = ($next->getTime() + $now);
					}
				} else {
					/** @var int $now */
					$now = $this->dateTimeProvider->getDateTime()->format('U');
					$time = ($next->getTime() + $now);
				}
			} else {
				if ($time = $this->BDataModel->getLastBuildTime($village->getId())) {
					$time += $next->getTime();
				} else {
					/** @var int $now */
					$now = $this->dateTimeProvider->getDateTime()->format('U');
					$time = ($next->getTime() + $now);
				}
			}
			$this->BDataModel->add([
				'wid'       => $vid,
				'field'     => $field,
				'type'      => $building,
				'timestamp' => $time,
				'level'     => $level,
			]);
			$this->VDataModel->update($vid, [
				'wood' => ($village->getActualWood() - $next->getWood()),
				'clay' => ($village->getActualClay() - $next->getClay()),
				'iron' => ($village->getActualIron() - $next->getIron()),
				'crop' => ($village->getActualCrop() - $next->getCrop()),
				'lastupdate2' => $this->dateTimeProvider->getDateTime()->format('U'),
			]);
		}
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @return float
	 */
	public function getMainBuildingSpeed($village)
	{
		$speed = 1;
		for ($i = 5; $i <= 39; $i++) {
			if ($village->getFData()['f' . $i . 't'] === BuildingModel::MAIN_BUILDING) {
				$mainBuilding = $this->getBuilding(BuildingModel::MAIN_BUILDING, $village->getFData()['f' . $i]);
				$speed = $mainBuilding->getParameter() / 100;
			}
		}

		return $speed;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function busyWorkers($building, $village)
	{
		if ($village->getOwner()->tribe === 1) {
			$maximumInnerQueue = 1;
			$maximumOuterQueue = 1;
			$innerQueue = $this->BDataModel->countInnerBuildingQueue($village->getId());
			$outerQueue = $this->BDataModel->countOuterBuildingQueue($village->getId());

		} else {
			$maximumInnerQueue = 1;
			$maximumOuterQueue = 0;
			$innerQueue = $this->BDataModel->countBuildingQueue($village->getId());
			$outerQueue = 0;
		}

		if ($village->getOwner()->plus === 1) {
			$maximumInnerQueue++;
			$maximumOuterQueue++;
		}

		if ($building->getBuilding() < 19 && $village->getOwner()->tribe === 1 && $outerQueue >= $maximumOuterQueue) {
			return TRUE;

		} elseif ($building->getBuilding() > 18 && $village->getOwner()->tribe === 1 && $innerQueue >= $maximumInnerQueue) {
			return TRUE;

		} elseif ($innerQueue >= $maximumInnerQueue) {
			return TRUE;
		}

		return FALSE;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param int $field
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function canBuild($building, $field, $village)
	{
		if ($this->busyWorkers($building, $village)) {
			return FALSE;
		}
		if ( ! $this->isStorageBigEnough($building, $village)) {
			return FALSE;
		}
		if ( ! $this->isGranaryBigEnough($building, $village)) {
			return FALSE;
		}
		if ($this->isThereEnoughResources($building, $village) !== TRUE) {
			return FALSE;
		}
		if ($this->canBuildLevel($building, $field, $village) !== TRUE) {
			return FALSE;
		}

		return TRUE;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function isThereEnoughResources($building, $village)
	{
		if (
			$building->getWood() < $village->getActualWood()
			&&
			$building->getClay() < $village->getActualClay()
			&&
			$building->getIron() < $village->getActualIron()
			&&
			$building->getCrop() < $village->getActualCrop()) {
			return TRUE;
		}
		$woodNeeded = $building->getWood() - $village->getActualWood();
		if ($woodNeeded > 0) {
			$time = round($woodNeeded / ($village->getProductionWood() / 3600));
		} else {
			$time = 0;
		}

		$clayNeeded = $building->getClay() - $village->getActualClay();
		if ($clayNeeded > 0) {
			$timeClay = round($clayNeeded / ($village->getProductionClay() / 3600));
			if ($timeClay > $time) {
				$time = $timeClay;
			}
		}

		$ironNeeded = $building->getIron() - $village->getActualIron();
		if ($ironNeeded > 0) {
			$timeIron = round($ironNeeded / ($village->getProductionIron() / 3600));
			if ($timeIron > $time) {
				$time = $timeIron;
			}
		}

		$cropNeeded = $building->getCrop() - $village->getProductionCrop();
		if ($cropNeeded > 0) {
			$timeCrop = round($cropNeeded / ($village->getProductionCrop() / 3600));
			if ($timeCrop > $time) {
				$time = $timeCrop;
			}
		}

		return time() + $time;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function isStorageBigEnough($building, $village)
	{
		if (
			$building->getWood() < $village->getStorage()
			&&
			$building->getClay() < $village->getStorage()
			&&
			$building->getIron() < $village->getStorage()
		) {
			return TRUE;
		}

		return FALSE;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function isGranaryBigEnough($building, $village)
	{
		if (
			$building->getCrop() < $village->getGranary()
		) {
			return TRUE;
		}

		return FALSE;
	}


	/**
	 * @param App\GameModule\DTO\Building $building
	 * @param int $field
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function canBuildLevel($building, $field, $village)
	{
		if ( ! $building) {
			return 'Building is at maximum level';
		}

		$current = $this->getBuilding($village->getFData()['f' . $field. 't'], $village->getFData()['f' . $field], $village);
		if ($current) {
			if ($current->getLevel() === $building->getLevel()) {
				return 'Building is at same level.';
			}

			/** @var \stdClass $maxLevel */
			$maxLevel = $this->buildingModel->getBuildingLevel($building->getBuilding(), ($current->getLevel() + 1));
			if ($current->getLevel() === $maxLevel->level) {
				return 'Building is at maximum level';
			}
			$queue = $this->BDataModel->getBuildingQueue($village->getId());
			foreach ($queue as $single) {
				if ($maxLevel->level === $single->level && $single->type === $building->getBuilding() && $single->field === $field) {
					return 'Building max level under construction';
				}
				if ($single->level === $building->getLevel() && $single->type === $building->getBuilding() && $single->field === $field) {
					return 'Building is already being build.';
				}
			}
		}

		return TRUE;
	}
}