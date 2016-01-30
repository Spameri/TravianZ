<?php

namespace App\FrontModule\Model\OData;

use App;

class ODataModel extends App\Model\BaseModel
{
	protected $table = 'odata';

	const MODE_WOOD = 1;
	const MODE_CLAY = 2;
	const MODE_IRON = 3;
	const MODE_CROP = 4;
	const MODE_CROP_BIG = 5;

	public $oasisType = [
		self::MODE_WOOD => [
			1,
			2,
			3,
		],
		self::MODE_CLAY => [
			4,
			5,
			6,
		],
		self::MODE_IRON => [
			7,
			8,
			9,
		],
		self::MODE_CROP => [
			3,
			6,
			9,
			10,
			11,
		],
		self::MODE_CROP_BIG => [
			12,
		]
	];

	/**
	 * @param int $user
	 * @param int $vid
	 * @param int $type
	 * @return int
     */
	public function countByUserVillage($user, $vid, $type)
	{
		return $this->database->select('count(wref)')->from($this->table)
			->where('owner = %i', $user)
			->where('wref = %i', $vid)
			->where('type IN %in', $this->oasisType[$type])
			->fetchSingle();
	}
}