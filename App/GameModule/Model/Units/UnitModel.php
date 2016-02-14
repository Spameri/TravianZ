<?php

namespace App\GameModule\Model\Units;

use App;

class UnitModel extends App\Model\BaseModel
{
	protected $table = 'unit';


	/**
	 * @return array
	 */
	public function getNames()
	{
		return $this->database->select('id, name')->from($this->table)
			->fetchPairs('id', 'name');
	}
}