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
		$nextLevel = $village->getFData()['f' . $field] + 1;
		$next = $this->buildingService->getBuilding($building, $nextLevel);
		$this->template->next = $next;
		$this->template->buildingQueue = $this->BDataModel->countBuildingQueue($village->getId());
		$canBuild = $this->BDataModel->countBuildingQueue($village->getId()) ? FALSE : TRUE;
		$this->template->canBuild = $canBuild;
		$this->template->village = $village;
		$this->template->field = $field;
	}


	public function renderDefault($village, $building, $field)
	{

	}

	public function actionFinishBuildingWithGold($wid)
	{

	}

	public function actionCancel($id)
	{

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