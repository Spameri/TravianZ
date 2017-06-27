<?php

namespace App\GameModule\Controls\Resource;

use Nette;
use App;

trait TResourceControl
{
	/** @var IResourceControl @inject */
	public $resourceFactory;


	protected function createComponentResource()
	{
		return $this->resourceFactory->create();
	}
}