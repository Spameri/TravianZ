<?php

namespace App\FrontModule\Model\User;

use App;
use Nette;

class UserService
{
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