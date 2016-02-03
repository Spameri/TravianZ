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
	}

    public function getBuilding($id, $level)
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

			$building->setBuilding($buildingData->id);

			$building->setWood($levelData->wood);
			$building->setClay($levelData->clay);
			$building->setIron($levelData->iron);
			$building->setCrop($levelData->crop);
			$building->setUpkeep($levelData->pop);
			$building->setTime(round($levelData->time / $this->speed));

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
			$buildingStats = $this->getBuilding($building->type, $building->level);
			$village = $this->villageService->getVillage($building->wid);
			$this->FDataModel->update($building->wid, [
				'f' . $building->field => $building->level,
			]);
			$data['pop'] = $village->getUpkeep() + $buildingStats->getUpkeep();
			switch ($buildingStats->getBuilding()) {
				case BuildingModel::WAREHOUSE:
					$data['maxstore'] = $buildingStats->getParameter();
					break;
			}
			$this->VDataModel->update($village->getId(), $data);
			$this->BDataModel->delete($building->id);
		}
	}


	public function build($vid, $field, $building, $level)
	{
		$next = $this->getBuilding($building, $level);
		$village = $this->villageService->getVillage($vid);
		if ($this->isThereEnoughResources($next, $village)) {
			if ($village->getOwner()->tribe === 1) {
				if ($next->getBuilding() < 19) {
					if ($time = $this->BDataModel->getLastOuterBuildTime($village->getId())) {
						$time += $next->getTime();
					} else {
						/** @var int $now */
						$now = $this->dateTimeProvider->getDateTime()->format('U');
						$time = ($next->getTime() + $now);
					}
				} elseif ($next->getBuilding() > 18) {
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
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function canBuild($building, $village)
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
		if ($this->canBuildLevel($building, $village) !== TRUE) {
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
	 * @param App\GameModule\DTO\Village $village
	 * @return bool
	 */
	public function canBuildLevel($building, $village)
	{
		if ( ! $building) {
			return 'Building is at maximum level';
		}

		$current = $this->getBuilding($building->getBuilding(), $village->getFData()['f' . $building->getBuilding()]);
		if ($village->getFData()['f' . $building->getBuilding()] === $building->getLevel()) {
			return 'Building is at same level.';
		}

		/** @var \stdClass $maxLevel */
		$maxLevel = $this->buildingModel->getBuildingLevel($building->getBuilding(), ($current->getLevel() + 1));
		if ($current->getLevel() === $maxLevel->level) {
			return 'Building is at maximum level';
		}

		$queue = $this->BDataModel->getBuildingQueue($village->getId());
		foreach ($queue as $single) {
			if ($maxLevel->level === $single->level && $single->type === $building->getBuilding()) {
				return 'Building max level under construction';
			}
			if ($single->level === $building->getLevel() && $single->type === $building->getBuilding()) {
				return 'Building is already being build.';
			}
		}

		return TRUE;
	}
}