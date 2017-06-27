<?php

namespace App\GameModule\Controls\Train;

use Nette;
use App;

class TrainControl extends Nette\Application\UI\Form
{
	/**
	 * @var array
	 */
	private $units;
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;


	public function __construct(
		$units
		, App\FrontModule\Model\VData\VillageService $villageService
	) {
		$this->units = $units;
		$this->villageService = $villageService;
	}


	public function attached($presenter)
	{
		parent::attached($presenter);

		/** @var App\GameModule\DTO\Unit $unit */
		foreach ($this->units as $unit) {
			$this->addText($unit->getId() . 'number', $unit->getName())
				->setAttribute('class', 'text')
				->addCondition(Nette\Forms\Form::NUMERIC);
		}

		$this->addSubmit('submit', 'Train')
			->setAttribute('type', 'image')
			->setAttribute('class', 'dynamic_img')
			->setAttribute('id', 'btn_train');

		return $this;
	}


	/**
	 * @return array
	 */
	public function getUnits()
	{
		return $this->units;
	}


	/**
	 * @param array $units
	 */
	public function setUnits($units)
	{
		$this->units = $units;
	}
}