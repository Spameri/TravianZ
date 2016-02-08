<?php
namespace App\GameModule\Model\Diplomacy;

use App;

class DiplomacyModel extends App\Model\BaseModel
{
	protected $table = 'diplomacy';

	const ALLIED = 1;
	const NEUTRAL = 2;
	const WAR = 3;


	public function getAliData($alliance1, $alliance2)
	{
		return $this->database->select('*')->from($this->table)
			->where('alli1 = %i', $alliance1)
			->where('alli2 = %i', $alliance2)
			->fetchAll();
	}


	/**
	 * @param int $alliance1
	 * @param int $alliance2
	 * @return \Dibi\Row|FALSE
	 */
	public function atAlliance($alliance1, $alliance2)
	{
		$found = $this->database->select('*')->from($this->table)
			->where('alli1 = %i', $alliance1)
			->where('alli2 = %i', $alliance2)
			->where('type = %i', self::ALLIED)
			->where('accepted = 1')
			->fetch();
		if ( ! $found) {
			$found = $this->database->select('*')->from($this->table)
				->where('alli2 = %i', $alliance1)
				->where('alli1 = %i', $alliance2)
				->where('type = %i', self::ALLIED)
				->where('accepted = 1')
				->fetch();
		}

		return $found;
	}


	/**
	 * @param int $alliance1
	 * @param int $alliance2
	 * @return \Dibi\Row|FALSE
	 */
	public function atWar($alliance1, $alliance2)
	{
		$found = $this->database->select('*')->from($this->table)
			->where('alli1 = %i', $alliance1)
			->where('alli2 = %i', $alliance2)
			->where('type = %i', self::WAR)
			->where('accepted = 1')
			->fetch();
		if ( ! $found) {
			$found = $this->database->select('*')->from($this->table)
				->where('alli2 = %i', $alliance1)
				->where('alli1 = %i', $alliance2)
				->where('type = %i', self::WAR)
				->where('accepted = 1')
				->fetch();
		}

		return $found;
	}
}