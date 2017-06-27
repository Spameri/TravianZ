<?php

namespace App\GameModule\Controls\BuildingDetail;

use Nette;
use App;

interface IBuildingDetailControl
{
	/** @return BuildingDetailControl */
	public function create();
}