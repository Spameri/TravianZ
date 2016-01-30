<?php

namespace App\GameModule\Controls\Building;


trait TBuildingControl
{
	/** @var IBuildingControl @inject */
	public $buildingFactory;


	protected function createComponentBuilding()
	{
		return $this->buildingFactory->create();
	}
}