<?php

namespace App\GameModule\Model\Units;

use App;


class UnitFactory
{
	/**
	 * @var UnitModel
	 */
	private $unitModel;
	private $speed;


	public function __construct(
		$speed
		, UnitModel $unitModel
	) {
		$this->speed = $speed;
		$this->unitModel = $unitModel;
	}


	/**
	 * @param int $id
	 * @param App\GameModule\DTO\Building|bool $building
	 * @return App\GameModule\DTO\Unit
	 */
	public function getUnit($id, $building = FALSE)
	{
		/** @var \stdClass $unitData */
		$unitData = $this->unitModel->get($id);

		$unit = new App\GameModule\DTO\Unit();

		$unit->setId($unitData->id);
		$unit->setName($unitData->name);
		$unit->setAttack($unitData->attack);
		$unit->setDefenceInfantry($unitData->defence_infantry);
		$unit->setDefenceCalvary($unitData->defence_calvary);
		$unit->setWood($unitData->wood);
		$unit->setClay($unitData->clay);
		$unit->setIron($unitData->iron);
		$unit->setCrop($unitData->crop);
		$unit->setUpkeep($unitData->pop);
		$unit->setSpeed($unitData->speed);
		$time = $unitData->time / $this->speed;
		if ($building) {
			$time = $time * ($building->getParameter() / 100);
		}
		$unit->setTime(round($time));
		$unit->setCapacity($unitData->capacity);
		$unit->setType($unitData->type);
		$unit->setTribe($unitData->tribe);

		return $unit;
	}
}