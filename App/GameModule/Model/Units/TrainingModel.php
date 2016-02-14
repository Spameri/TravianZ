<?php

namespace App\GameModule\Model\Units;

use App;

class TrainingModel extends App\Model\BaseModel
{
	protected $table = 'training';


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param int $building
	 * @return array
	 */
	public function getByBuilding($village, $building)
	{
		$query = $this->database->select('*')->from($this->table);
		$query->where('vref = %i', $village->getId());

		if ($building === App\GameModule\Model\Building\BuildingModel::BARRACKS) {
			$query->where('unit IN %in', UnitService::INFANTRY);
		}

		$query->orderBy('id ASC');

		return $query->fetchAll();
	}
}