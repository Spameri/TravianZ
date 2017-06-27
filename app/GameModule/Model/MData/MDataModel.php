<?php

namespace App\GameModule\Model\MData;

use App;

class MDataModel extends App\Model\BaseModel
{
	protected $table = 'mdata';


	/**
	 * @param int $uid
	 * @return array
	 */
	public function getUnread($uid)
	{
		return $this->database->select('*')->from($this->table)
			->where('viewed != 1')
			->where('send = 1')
			->where('target = %i', $uid)
			->fetchAll();
	}

	/**
	 * @param int $uid
	 * @return array
	 */
	public function countUnread($uid)
	{
		return $this->database->select('count(id)')->from($this->table)
			->where('viewed != 1')
			->where('send = 1')
			->where('target = %i', $uid)
			->fetchSingle();
	}
}