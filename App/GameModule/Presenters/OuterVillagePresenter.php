<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class OuterVillagePresenter extends GamePresenter
{
	use App\GameModule\Controls\Building\TBuildingControl;

	/** @var App\FrontModule\Model\VData\VillageService @inject */
	public $villageService;

	/** @var App\FrontModule\Model\VData\VDataModel @inject */
	public $VDataModel;

	/** @var App\GameModule\Model\Units\UnitsModel @inject */
	public $unitsModel;

	/** @var App\GameModule\Model\Units\UnitService @inject */
	public $unitService;


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
		$this->template->village = $this->villageService->getVillage($id);
		$this->template->units = $this->unitsModel->get($id);
		$this->template->unitNames = $this->unitService->getNames();
	}


	public function renderDefault($id)
	{

	}
}