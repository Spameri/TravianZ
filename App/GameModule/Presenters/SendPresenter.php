<?php

namespace App\GameModule\Presenters;

use App;


class SendPresenter extends GamePresenter
{
	use App\GameModule\Controls\SendUnits\TSendUnitsControl;

	/** @var App\GameModule\DTO\Village */
	private $village;
	/** @var App\FrontModule\Model\WData\WDataModel @inject */
	public $WDataModel;
	/** @var App\FrontModule\Model\VData\VillageService @inject */
	public $villageService;


	public function startup()
	{
		parent::startup();

		if ($id = $this->getParameter('id')) {
			$this->village = $this->villageService->getVillage($id);
			if ( ! $this->village->getOwner() || $this->village->getOwner()->id !== $this->user->id) {
				$this->redirect(':Game:OuterVillage:default');
			}
		}
	}


	public function actionDefault($id, $destination)
	{
		$this->village;
		/** @var \stdClass $wdata */
		$wdata = $this->WDataModel->get($id);
		if ($wdata->occupied) {
			$destinationVillage = $this->villageService->getVillage($destination);
		} else {
			$destinationVillage = FALSE;
		}


	}


	public function renderDefault($id, $destination)
	{

	}


	public function renderFoundVillage($id, $destination)
	{

	}
}