<?php

namespace App\GameModule\Model\Event;

use App;

class ProcessCulturePoints
{
	/**
	 * @var App\FrontModule\Model\User\UserModel
	 */
	private $userModel;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;


	public function __construct(
		App\FrontModule\Model\User\UserModel $userModel
		, App\FrontModule\Model\VData\VDataModel $VDataModel
	){
		$this->userModel = $userModel;
		$this->VDataModel = $VDataModel;
	}


	/**
	 * Recalculated in 10 minute cron.
	 */
	public function process()
	{
		$users = $this->userModel->getAllCulturePoints();
		foreach ($users as $user) {
			$villages = $this->VDataModel->getAllByUser($user->id);
			$production = 0;
			foreach ($villages as $village) {
				$production += $village->cp;
			}
			$culturePoints = $user->cp + ($production / 6);
			$this->userModel->update($user->id, [
				'cp' => $culturePoints,
			]);
		}
	}
}