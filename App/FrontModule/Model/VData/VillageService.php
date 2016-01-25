<?php

namespace App\FrontModule\Model\VData;

use App;

class VillageService
{
	/**
	 * @var VDataModel
	 */
	private $VDataModel;


	public function __construct(
		VDataModel $VDataModel
	) {
		$this->VDataModel = $VDataModel;
	}


	/**
	 * @param \stdClass $user
	 * @return string
	 */
	public function getNewVillageName($user)
	{
		$total = $this->VDataModel->countByUser($user->id);
		if ($total >= 1) {
			$villageName = $user->username . "'s village " . ($total + 1);
		} else {
			$villageName = $user->username . "'s village";
		}

		return $villageName;
	}
}