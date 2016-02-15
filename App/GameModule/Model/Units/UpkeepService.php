<?php

namespace App\GameModule\Model\Units;

class UpkeepService
{

	/**
	 * @var UnitsModel
	 */
	private $unitsModel;
	/**
	 * @var UnitFactory
	 */
	private $unitFactory;


	public function __construct(
		UnitFactory $unitFactory
		, UnitsModel $unitsModel
	) {
		$this->unitFactory = $unitFactory;
		$this->unitsModel = $unitsModel;
	}


	/**
	 * @param int $id
	 * @return int
	 */
	public function getUpkeep($id)
	{
		$upkeep = 0;
		$units = $this->unitsModel->get($id);
		for ($i = 1; $i < 50; $i++) {
			if ($units['u' . $i] > 0) {
				$unit = $this->unitFactory->getUnit($i);
				$upkeep = $unit->getUpkeep() * $units['u' . $i];
			}
		}

		return $upkeep;
	}
}