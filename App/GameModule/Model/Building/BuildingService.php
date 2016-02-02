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

        return $building;
    }


	public function processBuildings($time)
	{
		$buildings = $this->BDataModel->getBuilt($time);

		foreach ($buildings as $building) {
			$buildingStats = $this->getBuilding($building->type, $building->level);
			$village = $this->villageService->getVillage($building->wid);
			$this->FDataModel->update($building->wid, [
				'f' . $building->field => $building->level,
			]);
			$this->VDataModel->update($village->getId(), [
				'pop' => $village->getUpkeep() + $buildingStats->getUpkeep(),
			]);
			$this->BDataModel->delete($building->id);
		}
	}


	public function build($vid, $field, $building, $level)
	{
		$next = $this->getBuilding($building, $level);
		$village = $this->villageService->getVillage($vid);
		if ($next->getWood() < $village->getActualWood() && $next->getClay() < $village->getActualClay() && $next->getIron() < $village->getActualIron() && $next->getCrop() < $village->getActualCrop()) {
			$time = ($next->getTime() + $this->dateTimeProvider->getDateTime()->format('U'));
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
}