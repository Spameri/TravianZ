<?php

namespace App\GameModule\Controls\BuildingDetail;

use Nette;
use App;

class BuildingDetailControl extends Nette\Application\UI\Control
{

	public function render()
	{
		$this->template->current = $this->presenter->template->current;
		$this->template->next = $this->presenter->template->next;

		$building = $this->presenter->getParameter('building');
		switch ($building) {
			case App\GameModule\Model\Building\BuildingModel::WOODCUTTER:
			case App\GameModule\Model\Building\BuildingModel::CLAY_PIT:
			case App\GameModule\Model\Building\BuildingModel::IRON_MINE:
			case App\GameModule\Model\Building\BuildingModel::CROPLAND:
				$this->renderResourceField();
				break;
			case App\GameModule\Model\Building\BuildingModel::WAREHOUSE:
			case App\GameModule\Model\Building\BuildingModel::CRANNY:
			case App\GameModule\Model\Building\BuildingModel::GRANARY:
			case App\GameModule\Model\Building\BuildingModel::TRAPPER:
				$this->renderCapacity();
				break;
			case App\GameModule\Model\Building\BuildingModel::MAIN_BUILDING:
				$this->renderMainBuilding();
				break;
			case App\GameModule\Model\Building\BuildingModel::BARRACKS:
				$this->renderBarracks();
				break;
		}
	}


	public function renderBarracks()
	{
		$this->template->setFile(__DIR__ . '/Template/Barracks.latte');
		$this->template->render();
	}


	public function renderResourceField()
	{
		$this->template->setFile(__DIR__ . '/Template/ResourceField.latte');
		$this->template->render();
	}


	public function renderMainBuilding()
	{
		$this->template->setFile(__DIR__ . '/Template/MainBuilding.latte');
		$this->template->render();
	}


	public function renderCapacity()
	{
		$this->template->setFile(__DIR__ . '/Template/Capacity.latte');
		$this->template->render();
	}
}