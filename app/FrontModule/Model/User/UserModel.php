<?php

namespace App\FrontModule\Model\User;

use App;

class UserModel extends App\Model\BaseModel
{
	protected $table = 'users';

	const MULTIHUNTER_ID = 5;
	const NATURE_ID = 2;

	const PERMISSION_USER = 2;


	public function getByEmail($email)
	{
		return $this->database->select('*')->from($this->table)
			->where('email = %s', $email)
			->fetch();
	}


	public function getByUsername($username)
	{
		return $this->database->select('*')->from($this->table)
			->where('username = %s', $username)
			->fetch();
	}


	/**
	 * @return array
	 */
	public function getAllCulturePoints()
	{
		return $this->database->select('id, cp')->from($this->table)
			->fetchAll();
	}

}