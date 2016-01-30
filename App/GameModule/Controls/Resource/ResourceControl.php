<?php

namespace App\GameModule\Controls\Resource;

use Nette;
use App;
use Nette\ComponentModel\IContainer;

class ResourceControl extends Nette\Application\UI\Control
{
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;


	public function __construct(
		App\FrontModule\Model\VData\VillageService $villageService,
		App\FrontModule\Model\VData\VDataModel $VDataModel
	) {
		$this->villageService = $villageService;
		$this->VDataModel = $VDataModel;
	}


	public function render()
	{
		$id = $this->presenter->getParameter('id');
		if ( ! $id) {
			/** @var \stdClass $field */
			$field = $this->VDataModel->getByUser($this->presenter->user->getId());
			$id = $field->wref;
		}
		$this->template->village = $this->villageService->getVillage($id);
		$this->template->gold = 40;


		$this->template->setFile(__DIR__ . '/ResourceControl.latte');
		$this->template->render();
	}
}