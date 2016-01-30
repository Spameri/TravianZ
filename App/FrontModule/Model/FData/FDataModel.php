<?php
	
namespace App\FrontModule\Model\FData;

use App;

class FDataModel extends App\Model\BaseModel
{
	protected $table = 'fdata';

	public static $coordinates = [
		1 => "101,33,28",
		2 => "165,32,28",
		3 => "224,46,28",
		4 => "46,63,28",
		5 => "138,74,28",
		6 => "203,94,28",
		7 => "262,86,28",
		8 => "31,117,28",
		9 => "83,110,28",
		10 => "214,142,28",
		11 => "269,146,28",
		12 => "42,171,28",
		13 => "93,164,28",
		14 => "160,184,28",
		15 => "239,199,28",
		16 => "87,217,28",
		17 => "140,231,28",
		18 => "190,232,28",
	];

	public static $names = [
		1 => 'Woodcutter',
		2 => 'Clay Pit',
		3 => 'Iron Mine',
		4 => 'Cropland',
	];


	/**
	 * @param int $type
	 * @param int $vid
	 */
	public function addResourceFields($type, $vid)
	{
		$query = FALSE;
		switch ($type) {
			case 1:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 4, 4, 1, 4, 4, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 2:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 3, 4, 1, 3, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 3:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 1, 4, 1, 3, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 4:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 1, 4, 1, 2, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 5:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 1, 4, 1, 3, 1, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 6:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 4, 4, 1, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 4, 4, 1, 15)";
				break;
			case 7:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 1, 4, 4, 1, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 8:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 3, 4, 4, 1, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 9:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 3, 4, 4, 1, 1, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 10:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 3, 4, 1, 2, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
			case 11:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 3, 1, 1, 3, 1, 4, 4, 3, 3, 2, 2, 3, 1, 4, 4, 2, 4, 4, 1, 15)";
				break;
			case 12:
				$query = "INSERT INTO " . $this->table . " (vref, f1t, f2t, f3t, f4t, f5t, f6t, f7t, f8t, f9t, f10t, f11t, f12t, f13t, f14t, f15t, f16t, f17t, f18t, f26, f26t) values($vid, 1, 4, 1, 1, 2, 2, 3, 4, 4, 3, 3, 4, 4, 1, 4, 2, 1, 2, 1, 15)";
				break;
		}

		if ($query) {
			$this->database->query($query);
		}
	}

	/**
	 * @param int $vref
	 * @return \Dibi\Row|FALSE
     */
	public function getByVref($vref)
	{
		return $this->database->select('*')->from($this->table)
			->where('vref = %i', $vref)
			->fetch();
	}
}