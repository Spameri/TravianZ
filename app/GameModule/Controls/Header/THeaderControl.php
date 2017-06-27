<?php

namespace App\GameModule\Controls\Header;


trait THeaderControl
{
	/** @var IHeaderControl @inject */
	public $headerFactory;


	protected function createComponentHeader()
	{
		return $this->headerFactory->create();
	}
}