<?php

namespace App\FrontModule\Model\User;

use App;
use Nette;

class LoginService
{

	/**
	 * @var UserModel
	 */
	private $userModel;
	/**
	 * @var App\GameModule\Model\Online\OnlineModel
	 */
	private $onlineModel;


	public function __construct(
		UserModel $userModel,
	 	App\GameModule\Model\Online\OnlineModel $onlineModel
	) {
		$this->userModel = $userModel;
		$this->onlineModel = $onlineModel;
	}


	public function authenticate($username, $password)
	{
		/** @var \stdClass $user */
		$user = $this->userModel->getByUsername($username);

		if ( ! $user) {
			throw new Nette\Security\AuthenticationException('Username does not exist.');

		} elseif ( ! Nette\Security\Passwords::verify($password, $user->password)) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.');
		}

		unset($user->password);

		return new Nette\Security\Identity($user->id, $user->access, $user);
	}


	/**
	 * @param int $uid
	 */
	public function setOnline($uid)
	{
		$this->onlineModel->setOnline($uid);
	}
}