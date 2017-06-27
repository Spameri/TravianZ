<?php

namespace App\GameModule\Model\Event;

use App;
use Kdyby;

class ProcessEvents
{
	/**
	 * @var App\GameModule\Model\Building\BuildingService
	 */
	private $buildingService;
	/**
	 * @var App\GameModule\Model\Production\ProductionService
	 */
	private $productionService;
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;
	/**
	 * @var Kdyby\Clock\IDateTimeProvider
	 */
	private $dateTimeProvider;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;
	/**
	 * @var ProcessTraining
	 */
	private $processTraining;


	public function __construct(
		App\GameModule\Model\Building\BuildingService $buildingService,
		App\GameModule\Model\Production\ProductionService $productionService,
		App\FrontModule\Model\VData\VillageService $villageService,
		Kdyby\Clock\IDateTimeProvider $dateTimeProvider,
		App\FrontModule\Model\VData\VDataModel $VDataModel
		, ProcessTraining $processTraining
	){
		$this->buildingService = $buildingService;
		$this->productionService = $productionService;
		$this->villageService = $villageService;
		$this->dateTimeProvider = $dateTimeProvider;
		$this->VDataModel = $VDataModel;
		$this->processTraining = $processTraining;
	}


	public function process()
	{
		if ( ! $this->isLocked()) {
			$time = $this->dateTimeProvider->getDateTime()->format('U');
			$ids = $this->VDataModel->getAllIds();
			foreach ($ids as $id) {
				$village = $this->villageService->getVillage($id);
				$this->productionService->processProduction($village, $time);
			}
			$this->buildingService->processBuildings($time);
			$this->processTraining->process($time);

			$this->releaseLock();
		}
	}

	public function isLocked()
	{
		// TODO load lock from database
		// TODO if lock found return true

		// TODO else save lock to database and return FALSE
		return FALSE;
	}

	public function releaseLock()
	{
		// TODO delete lock from database
		return TRUE;
	}
}