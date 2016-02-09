<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class InnerVillagePresenter extends GamePresenter
{
	use App\GameModule\Controls\Building\TBuildingControl;

	/** @var App\FrontModule\Model\VData\VDataModel @inject */
	public $VDataModel;
	/** @var App\FrontModule\Model\VData\VillageService @inject */
	public $villageService;
	/** @var App\GameModule\Model\Building\BuildingService @inject */
	public $buildingService;
	/** @var App\GameModule\Model\Building\BuildingModel @inject */
	public $buildingModel;


	public function startup()
	{
		parent::startup();

		if ($id = $this->getParameter('id')) {
			$village = $this->villageService->getVillage($id);
			if ( ! $village->getOwner() || $village->getOwner()->id !== $this->user->id) {
				$this->redirect(':Game:OuterVillage:default');
			}
		}
	}


	public function actionDefault($id)
	{
		if ( ! $id) {
			/** @var \stdClass $field */
			$field = $this->VDataModel->getByUser($this->presenter->user->getId());
			$id = $field->wref;
		}
		$this->template->village = $village = $this->villageService->getVillage($id);
		$this->template->names = $this->buildingModel->getAll();
		if ($village->getOwner()->tribe === 1) {
			$wallId = 31;

		} elseif ($village->getOwner()->tribe === 2) {
			$wallId = 32;

		} else {
			$wallId = 33;
		}
		$this->template->wallId = $wallId;
		$this->template->wallLevel = $village->getFData()['f' . $wallId];

	}


	public function renderDefault($id)
	{

	}
}