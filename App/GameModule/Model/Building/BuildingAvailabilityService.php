<?php

namespace App\GameModule\Model\Building;

use App;

class BuildingAvailabilityService
{
	/**
	 * @var BuildingService
	 */
	private $buildingService;
	/**
	 * @var BuildingModel
	 */
	private $buildingModel;


	public function __construct(
		BuildingService $buildingService,
		BuildingModel $buildingModel
	) {
		$this->buildingService = $buildingService;
		$this->buildingModel = $buildingModel;
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @return array
	 */
	public function getAvailable($village, $field)
	{
		$available = [];

		if ($field == 40) {
			if ($village->getOwner()->tribe === 1) {
				$available[] = $this->buildingService->getBuilding(BuildingModel::CITY_WALL, 1);
				return $available;

			} elseif ($village->getOwner()->tribe === 2) {
				$available[] = $this->buildingService->getBuilding(BuildingModel::EARTH_WALL, 1);
				return $available;

			} elseif ($village->getOwner()->tribe === 3) {
				$available[] = $this->buildingService->getBuilding(BuildingModel::PALISADE, 1);
				return $available;

			}
		}
		if ($field == 39) {
			$available[] = $this->buildingService->getBuilding(BuildingModel::RALLY_POINT, 1);
			return $available;
		}

		$buildings = $this->buildingModel->getAll();

		foreach ($buildings as $building => $name) {
			if ($building < 5) {
				continue;
			}
			if ($this->isBuilt($village, $building)) {
				continue;
			}
			if (in_array($building, [BuildingModel::CITY_WALL, BuildingModel::EARTH_WALL, BuildingModel::PALISADE, BuildingModel::RALLY_POINT])) {
				continue;
			}

			if ($village->getNatar() === 0 && $building === BuildingModel::WORLD_WONDER){
				continue;
			}

			$requirements = $this->buildingModel->getRequirements($building);
			$passed = FALSE;
			foreach ($requirements as $requirement) {
				$built = $this->isBuilt($village, $requirement->require_building);
				if ($built && $requirement->exclude_building === $built->getBuilding()) {
					$passed = FALSE;
					break;
				}
				if ($built && $built->getLevel() >= $requirement->require_level) {
					$passed = TRUE;
				} else {
					$passed = FALSE;
					break;
				}
			}
			if ( ! $requirements || $passed) {
				$available[] = $this->buildingService->getBuilding($building, 1);
			}
		}

		return $available;
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param int $building
	 * @return App\GameModule\DTO\Building|bool
	 */
	public function isBuilt($village, $building)
	{
		for ($i = 19; $i <= 40; $i++) {
			if ($village->getFData()['f' . $i . 't'] === $building) {
				return $this->buildingService->getBuilding($building, $village->getFData()['f' . $i]);
			}
		}

		return FALSE;
	}
}