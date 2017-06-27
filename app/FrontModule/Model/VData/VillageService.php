<?php

namespace App\FrontModule\Model\VData;

use App;
use Nette;

class VillageService
{
	const ARTIFACT_TYPE = 10;
	const VALLEY_TYPE = [
		1 => '3-3-3-9',
		2 => '3-4-5-6',
		3 => '4-4-4-6',
		4 => '4-5-3-6',
		5 => '5-3-4-6',
		6 => '1-1-1-15',
		7 => '4-4-3-7',
		8 => '3-4-4-7',
		9 => '4-3-4-7',
		10 => '3-5-4-6',
		11 => '4-3-5-6',
		12 => '5-4-3-6',
	];
	const OASIS_TYPE = [
		1 => '+25% Lumber',
		2 => '+25% Lumber',
		3 => '+25% Lumber',
		4 => '+25% Clay',
		5 => '+25% Clay',
		6 => '+25% Clay',
		7 => '+25% Iron',
		8 => '+25% Iron',
		9 => '+25% Iron',
		10 => '+25% Crop',
		11 => '+25% Crop',
		12 => '+50% Crop',
	];

	/**
	 * @var VDataModel
	 */
	private $VDataModel;
	/**
	 * @var App\FrontModule\Model\WData\WDataModel
	 */
	private $WDataModel;
	/**
	 * @var App\FrontModule\Model\FData\FDataModel
	 */
	private $FDataModel;
	/**
	 * @var App\GameModule\Model\Production\ProductionService
	 */
	private $productionService;
	/**
	 * @var App\FrontModule\Model\User\UserModel
	 */
	private $userModel;
	/**
	 * @var App\GameModule\Model\Units\UpkeepService
	 */
	private $upkeepService;


	public function __construct(
		VDataModel $VDataModel
		, App\FrontModule\Model\WData\WDataModel $WDataModel
		, App\FrontModule\Model\FData\FDataModel $FDataModel
		, App\GameModule\Model\Production\ProductionService $productionService
		, App\FrontModule\Model\User\UserModel $userModel
		, App\GameModule\Model\Units\UpkeepService $upkeepService
	) {
		$this->VDataModel = $VDataModel;
		$this->WDataModel = $WDataModel;
		$this->FDataModel = $FDataModel;
		$this->productionService = $productionService;
		$this->userModel = $userModel;
		$this->upkeepService = $upkeepService;
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
		$village->setId($id);
		if ($VData) {
			/** @var \stdClass $owner */
			$owner = $this->userModel->get($VData->owner);
			$village->setOwner($owner);

			$village->setActualWood($VData->wood);
			$village->setActualClay($VData->clay);
			$village->setActualIron($VData->iron);
			$village->setActualCrop($VData->crop);
			$village->setStorage($VData->maxstore);
			$village->setGranary($VData->maxcrop);

			$upkeep = $VData->pop + $this->upkeepService->getUpkeep($id);
			$village->setUpkeep($upkeep);

			$village->setName($VData->name);
			$village->setLoyalty($VData->loyalty);
			$village->setCapital($VData->capital);

			$village->setType($VData->type);
			$village->setNatar($VData->natar);
			$village->setCulturePoints($VData->cp);
			$village->setPopulation($VData->pop);

			$FData = $this->FDataModel->getByVref($village->getId())->toArray();
			$village->setFData($FData);

			$village->setProductionWood($this->productionService->getProductionWood($village));
			$village->setProductionClay($this->productionService->getProductionClay($village));
			$village->setProductionIron($this->productionService->getProductionIron($village));
			$village->setProductionCrop($this->productionService->getProductionCrop($village));
			$village->setMaxUpkeep($this->productionService->getBaseProductionCrop($village));
		}

		return $village;
	}
}