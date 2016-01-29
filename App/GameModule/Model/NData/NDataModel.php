<?php

namespace App\GameModule\Model\NData;

use App;

class NDataModel extends App\Model\BaseModel
{
	protected $table = 'ndata';


	/**
	 * @param int $uid
	 * @return array
	 */
	public function getUnread($uid)
	{
		return $this->database->select('*')->from($this->table)
			->where('viewed != 1')
			->where('uid = %i', $uid)
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
			->where('uid = %i', $uid)
			->fetchSingle();
	}
}