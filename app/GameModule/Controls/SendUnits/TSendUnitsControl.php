<?php

namespace App\GameModule\Controls\SendUnits;

use Nette;
use App;

trait TSendUnitsControl
{
	/** @var ISendUnitsControl @inject */
	public $sendUnitsFactory;


	protected function createComponentSendUnits()
	{
		return $this->sendUnitsFactory->create();
	}
}