<?php

namespace App\GameModule\Controls\BuildingDetail;

use Nette;
use App;

trait TBuildingDetailControl
{
	/** @var IBuildingDetailControl @inject */
	public $buildingDetail;


	protected function createComponentBuildingDetail()
	{
		return $this->buildingDetail->create();
	}
}