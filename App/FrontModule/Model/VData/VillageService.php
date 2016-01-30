<?php

namespace App\FrontModule\Model\VData;

use App;
use Nette;

class VillageService
{
	/**
	 * @var VDataModel
	 */
	private $VDataModel;
	/**
	 * @var App\FrontModule\Model\WData\WDataModel
	 */
	private $WDataModel;


	public function __construct(
		VDataModel $VDataModel,
		App\FrontModule\Model\WData\WDataModel $WDataModel
	) {
		$this->VDataModel = $VDataModel;
		$this->WDataModel = $WDataModel;
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


	/**
	 * @param int $place
	 */
	public function getRegistrationPlace($place)
	{
		if ($place === 0) {
			$place = rand(1, 4);
		}
		$this->WDataModel->getRandom($place);
	}

	/**
	 * @param int $id
	 * @return App\GameModule\DTO\Village
     */
	public function getVillage($id)
	{
		/** @var \stdClass $VData */
		$VData = $this->VDataModel->getByWId($id);
		$village = new App\GameModule\DTO\Village();

		$village->setActualWood($VData->wood);
		$village->setActualClay($VData->clay);
		$village->setActualIron($VData->iron);
		$village->setActualCrop($VData->crop);
		$village->setStorage($VData->maxstore);
		$village->setGranary($VData->maxcrop);

		$village->setUpkeep($VData->pop);

		return $village;
	}
}