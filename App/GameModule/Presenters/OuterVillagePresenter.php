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
	}


	public function renderDefault($id)
	{

	}
}