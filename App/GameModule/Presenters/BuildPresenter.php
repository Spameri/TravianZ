<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class BuildPresenter extends GamePresenter
{
	/** @var App\GameModule\Model\Building\BuildingService @inject */
	public $buildingService;

	/** @var App\FrontModule\Model\VData\VillageService @inject */
	public $villageService;

	/** @var App\GameModule\Model\BData\BDataModel @inject */
	public $BDataModel;


	public function actionDefault($village, $building, $field)
	{
		$village = $this->villageService->getVillage($village);
		$current = $this->buildingService->getBuilding($building, $village->getFData()['f' . $field]);
		$this->template->current = $current;
		$queue = $this->BDataModel->getBuildingQueue($village->getId());
		$nextLevel = $village->getFData()['f' . $field] + 1;
		foreach ($queue as $single) {
			if ($single->type == $current->getBuilding() && $nextLevel < $single->level && $single->field == $field) {
				$nextLevel = $single->level;
				$nextLevel++;
			}
		}
		if ($nextLevel == 0) {
			$nextLevel++;
		}
		$next = $this->buildingService->getBuilding($building, $nextLevel);

		$this->template->village = $village;
		$this->template->field = $field;
		$this->template->next = $next;

		$this->template->canBuild = $next ? $this->buildingService->canBuild($next, $field, $village) : FALSE;
		$this->template->busyWorkers = $next ? $this->buildingService->busyWorkers($next, $village) : FALSE;
		$this->template->storage = $next ? $this->buildingService->isStorageBigEnough($next, $village) : FALSE;
		$this->template->granary = $next ? $this->buildingService->isGranaryBigEnough($next, $village) : FALSE;
		$this->template->resources = $next ? $this->buildingService->isThereEnoughResources($next, $village) : FALSE;
		$this->template->buldingStatus = $this->buildingService->canBuildLevel($next, $field, $village);
	}


	public function renderDefault($village, $building, $field)
	{

	}

	public function actionFinishBuildingWithGold($wid)
	{

	}

	public function actionCancel($id)
	{
		$BData = $this->BDataModel->get($id);
		$this->BDataModel->delete($id);
		if ($BData->type < 19) {
			$this->redirect(':Game:OuterVillage:default', $BData->wid);

		} else {
			$this->redirect(':Game:InnerVillage:default', $BData->wid);
		}
	}

	public function actionBuild($vid, $field, $building, $level)
	{
		$this->buildingService->build($vid, $field, $building, $level);
		if ($field < 19) {
			$this->redirect(':Game:OuterVillage:default', $vid);

		} else {
			$this->redirect(':Game:InnerVillage:default', $vid);
		}
	}
}