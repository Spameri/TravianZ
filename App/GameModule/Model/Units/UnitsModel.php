<?php

namespace App\GameModule\Model\Units;

use App;

class UnitsModel extends App\Model\BaseModel
{
	protected $table = 'units';


	/**
	 * @param int $id
	 * @return \Dibi\Row|FALSE
	 */
	public function get($id)
	{
		return $this->database->select('*')->from($this->table)
			->where('vref = %i', $id)
			->fetch()
			->toArray();
	}


	public function update($id, $data)
	{
		return $this->database->update($this->table, $data)
			->where('vref = %i', $id)
			->execute();
	}

}