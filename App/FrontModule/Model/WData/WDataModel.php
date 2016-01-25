<?php

namespace App\FrontModule\Model\WData;

use App;
use Dibi;
use Nette;

class WDataModel extends App\Model\BaseModel
{
	protected $table = 'wdata';

	/**
	 * @param int $x
	 * @param int $y
	 * @return \Dibi\Row|FALSE
	 */
	public function getByCoordinates($x, $y)
	{
		return $this->database->select('*')->from($this->table)
			->where('x = %i', $x)
			->where('y = %i', $y)
			->fetch();
	}

	public function setFieldTaken($id)
	{
		$this->database->update($this->table, [
			'occupied' => 1
		])
			->where('id = %i', $id)
			->execute();
		return $id;
	}
}