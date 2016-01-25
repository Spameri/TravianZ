<?php

namespace App\FrontModule\Model\User;

use App;
use Nette;

class RegisterService
{
	/**
	 * @var UserModel
	 */
	private $userModel;
	/**
	 * @var App\FrontModule\Model\WData\WDataModel
	 */
	private $WDataModel;
	/**
	 * @var App\FrontModule\Model\FData\FDataModel
	 */
	private $FDataModel;
	/**
	 * @var App\FrontModule\Model\Units\UnitsModel
	 */
	private $unitsModel;
	/**
	 * @var App\FrontModule\Model\TData\TDataModel
	 */
	private $TDataModel;
	/**
	 * @var App\FrontModule\Model\ABData\ABDataModel
	 */
	private $ABDataModel;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;


	public function __construct(
		UserModel $userModel,
		App\FrontModule\Model\WData\WDataModel $WDataModel,
		App\FrontModule\Model\FData\FDataModel $FDataModel,
		App\FrontModule\Model\Units\UnitsModel $unitsModel,
		App\FrontModule\Model\TData\TDataModel $TDataModel,
		App\FrontModule\Model\ABData\ABDataModel $ABDataModel,
		App\FrontModule\Model\VData\VDataModel $VDataModel,
		App\FrontModule\Model\VData\VillageService $villageService
	) {
		$this->userModel = $userModel;
		$this->WDataModel = $WDataModel;
		$this->FDataModel = $FDataModel;
		$this->unitsModel = $unitsModel;
		$this->TDataModel = $TDataModel;
		$this->ABDataModel = $ABDataModel;
		$this->VDataModel = $VDataModel;
		$this->villageService = $villageService;
	}


	public function createMultihunter($data)
	{
		/** @var \stdClass $multihunter */
		$this->userModel->update(UserModel::MULTIHUNTER_ID, [
				'password' => Nette\Security\Passwords::hash($data->password),
			]);
		$multihunter = $this->userModel->get(UserModel::MULTIHUNTER_ID);

		/** @var \stdClass $field */
		$field = $this->WDataModel->getByCoordinates(0, 0);
		if ($field->occupied != 0 || $field->oasistype != 0) {
			$this->WDataModel->setFieldTaken($field->id);
			$villageName = $this->villageService->getNewVillageName($multihunter);
			$vid = $this->VDataModel->addVillageForUser($multihunter, $field, $villageName);
			$this->FDataModel->addResourceFields($field->fieldtype, $vid);
			$this->unitsModel->add([
					'vref' => $vid,
				]);
			$this->TDataModel->add([
					'vref' => $vid,
				]);
			$this->ABDataModel->add([
					'vref' => $vid,
				]);
		}
	}


	/**
	 * Save registration form.
	 *
	 * @param \stdClass $data
	 * @return \stdClass
	 */
	public function registerUser($data)
	{
		$userId = $this->userModel->add([
			'email' => $data->email,
			'username' => $data->username,
			'password' => Nette\Security\Passwords::hash($data->password),
		]);

		return $this->userModel->get($userId);
	}


	/**
	 * Handle all related to create new user.
	 */
	public function createUser()
	{

	}
}