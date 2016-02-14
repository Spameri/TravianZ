<?php

namespace App\FrontModule\Model\User;

use App;
use Nette;

class UserService
{
	const TRIBE_ROMANS = 1;
	const TRIBE_TEUTONS = 2;
	const TRIBE_GAULS = 3;
	const TRIBE_NATURE = 4;
	const TRIBE_NATARS = 5;
	const TRIBE_BARBARIAN = 6;

	/**
	 * @var UserModel
	 */
	private $userModel;


	public function __construct(
		UserModel $userModel
	) {
		$this->userModel = $userModel;
	}


	public function hasPlus($uid)
	{
		/** @var \stdClass $user */
		$user = $this->userModel->get($uid);
		if ($user->plus > time()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}