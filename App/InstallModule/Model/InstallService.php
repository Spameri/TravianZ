<?php

namespace App\InstallModule\Model;

use App;

class InstallService extends App\Model\BaseService
{
	public function createDatabase()
	{
		$this->database->loadFile(__DIR__ . '/../Sql/Database.sql');
	}
}