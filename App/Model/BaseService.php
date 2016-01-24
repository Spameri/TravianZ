<?php

namespace App\Model;

use Dibi;

abstract class BaseService
{
	/** @var Dibi\Connection */
	protected $database;


	public function __construct(
		Dibi\Connection $database
	) {
		$this->database = $database;
	}
}