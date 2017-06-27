<?php

namespace App\GameModule\Model\Online;

use App;
use Dibi;

class OnlineModel extends App\Model\BaseModel
{
	protected $table = 'online';


	/**
	 * @param int $uid
	 */
	public function setOnline($uid)
	{
		try {
			$this->database->insert($this->table, [
				'name' => 'login',
				'uid' => $uid,
				'time' => time(),
			])
				->execute();
		} catch (Dibi\DriverException $e) {
			$this->database->update($this->table, [
				'name' => 'login',
				'time' => time(),
			])
				->where('uid = %i', $uid)
				->execute();
		}
	}
}