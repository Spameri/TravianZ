<?php

namespace App\InstallModule\Model;

use App;
use Dibi;

class WorldGenerator extends App\Model\BaseService
{
	/**
	 * @var int
	 */
	private $worldSize;


	public function __construct(
		Dibi\Connection $database,
		$worldSize
	) {
		parent::__construct($database);
		$this->worldSize = $worldSize;
	}


	/**
	 * Generates world data
	 */
	public function generate()
	{
		$this->database->delete('wdata')->execute();

		$totalFields = 1 + 2 * $this->worldSize;

		for ($i = 0; $i < $totalFields; $i++) {
			$y = $this->worldSize - $i;
			for ($j = 0; $j < $totalFields; $j++) {
				$x = $this->worldSize * -1 + $j;

				if (($x == 0 & $y == 0) || ($x == $this->worldSize & $y == $this->worldSize)) {
					$field['fieldtype'] = 3;
					$field['oasistype'] = 0;
				} else {
					$field = $this->calculateFieldType();
				}

				if ($field['oasistype'] === 1) {
					$field['image'] = "t" . rand(0, 9) . "";
				} else {
					$field['image'] = "o" . $field['oasistype'] . "";
				}

				$this->saveField($field);
			}
		}
	}


	/**
	 * @param array $data
	 * @return int
	 */
	public function saveField($data)
	{
		$this->database->insert('wdata', $data)
			->execute();
		return $this->database->insertId;
	}


	/**
	 * @return array
	 */
	public function calculateFieldType()
	{
		$rand = rand(1, 1000);
		if (10 >= $rand) {
			$field['fieldtype'] = 1;
			$field['oasistype'] = 0;

		} elseif (90 >= $rand) {
			$field['fieldtype'] = 2;
			$field['oasistype'] = 0;

		} elseif (400 >= $rand) {
			$field['fieldtype'] = 3;
			$field['oasistype'] = 0;

		} elseif (480 >= $rand) {
			$field['fieldtype'] = 4;
			$field['oasistype'] = 0;

		} elseif (560 >= $rand) {
			$field['fieldtype'] = 5;
			$field['oasistype'] = 0;

		} elseif (570 >= $rand) {
			$field['fieldtype'] = 6;
			$field['oasistype'] = 0;

		} elseif (600 >= $rand) {
			$field['fieldtype'] = 7;
			$field['oasistype'] = 0;

		} elseif (630 >= $rand) {
			$field['fieldtype'] = 8;
			$field['oasistype'] = 0;

		} elseif (660 >= $rand) {
			$field['fieldtype'] = 9;
			$field['oasistype'] = 0;

		} elseif (740 >= $rand) {
			$field['fieldtype'] = 10;
			$field['oasistype'] = 0;

		} elseif (820 >= $rand) {
			$field['fieldtype'] = 11;
			$field['oasistype'] = 0;

		} elseif (900 >= $rand) {
			$field['fieldtype'] = 12;
			$field['oasistype'] = 0;

		} else if (908 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 1;

		} else if (916 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 2;

		} elseif (924 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 3;

		} elseif (932 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 4;

		} elseif (940 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 5;

		} elseif (948 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 6;

		} elseif (956 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 7;

		} elseif (964 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 8;

		} elseif (972 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 9;

		} elseif (980 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 10;

		} elseif (988 >= $rand) {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 11;

		} else {
			$field['fieldtype'] = 0;
			$field['oasistype'] = 12;
		}

		return $field;
	}
}