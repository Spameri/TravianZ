<?php

namespace App\GameModule\Controls\Resource;

use Nette;
use App;

class ResourceControl extends Nette\Application\UI\Control
{
	public function render()
	{
		$this->template->actualWood = 750;
		$this->template->actualClay = 750;
		$this->template->actualIron = 750;
		$this->template->actualCrop = 750;
		$this->template->store = 800;
		$this->template->granary = 800;
		$this->template->upkeep = 2;
		$this->template->cropProduction = 15;
		$this->template->gold = 40;


		$this->template->setFile(__DIR__ . '/ResourceControl.latte');
		$this->template->render();
	}
}