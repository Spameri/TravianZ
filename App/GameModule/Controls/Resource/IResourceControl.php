<?php

namespace App\GameModule\Controls\Resource;

use Nette;
use App;

interface IResourceControl
{
	/** @return ResourceControl */
	public function create();
}