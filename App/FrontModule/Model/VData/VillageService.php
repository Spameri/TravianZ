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


	public function __construct(
		VDataModel $VDataModel,
		App\FrontModule\Model\WData\WDataModel $WDataModel,
		App\FrontModule\Model\FData\FDataModel $FDataModel,
		App\GameModule\Model\Production\ProductionService $productionService,
		App\FrontModule\Model\User\UserModel $userModel
	) {
		$this->VDataModel = $VDataModel;
		$this->WDataModel = $WDataModel;
		$this->FDataModel = $FDataModel;
		$this->productionService = $productionService;
		$this->userModel = $userModel;
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

		/** @var \stdClass $owner */
		$owner = $this->userModel->get($VData->owner);
		$village->setOwner($owner);

		$village->setId($VData->wref);

		$village->setActualWood($VData->wood);
		$village->setActualClay($VData->clay);
		$village->setActualIron($VData->iron);
		$village->setActualCrop($VData->crop);
		$village->setStorage($VData->maxstore);
		$village->setGranary($VData->maxcrop);

		$village->setUpkeep($VData->pop);

		$village->setName($VData->name);
		$village->setLoyalty($VData->loyalty);
		$village->setCapital($VData->capital);

		$village->setType($VData->type);
		$village->setNatar($VData->natar);

		$FData = $this->FDataModel->getByVref($village->getId())->toArray();
		$village->setFData($FData);

		$village->setProductionWood($this->productionService->getProductionWood($village));
		$village->setProductionClay($this->productionService->getProductionClay($village));
		$village->setProductionIron($this->productionService->getProductionIron($village));
		$village->setProductionCrop($this->productionService->getProductionCrop($village));
		$village->setMaxUpkeep($this->productionService->getProductionCrop($village));

		return $village;
	}
}