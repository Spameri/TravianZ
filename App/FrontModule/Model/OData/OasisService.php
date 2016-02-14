<?php

namespace App\FrontModule\Model\OData;

use App;

class OasisService
{
	/**
	 * @var ODataModel
	 */
	private $ODataModel;
	/**
	 * @var App\FrontModule\Model\WData\WDataModel
	 */
	private $WDataModel;
	/**
	 * @var App\GameModule\Model\Units\UnitsModel
	 */
	private $unitsModel;


	public function __construct(
		ODataModel $ODataModel,
		App\FrontModule\Model\WData\WDataModel $WDataModel,
		App\GameModule\Model\Units\UnitsModel $unitsModel
	) {
		$this->ODataModel = $ODataModel;
		$this->WDataModel = $WDataModel;
		$this->unitsModel = $unitsModel;
	}


	public function populateOasis()
	{
		$oases = $this->WDataModel->getAllOases();

		foreach ($oases as $oasis) {
			if ($oasis->oasistype < 4) {
				$high = 1;

			} elseif ($oasis->oasistype < 10) {
				$high = 2;

			} else {
				$high = 0;
			}
			$this->ODataModel->add([
				'wref' => $oasis->id,
				'type' => $oasis->oasistype,
				'wood' => 800,
				'iron' => 800,
				'clay' => 800,
				'crop' => 800,
				'maxstore' => 800,
				'maxcrop' => 800,
				'loyalty' => 100,
				'owner' => App\FrontModule\Model\User\UserModel::NATURE_ID,
				'name' => 'Unoccupied Oasis',
				'high' => $high,
			]);

			$this->saveOasisUnits($oasis->id, $oasis->oasistype);
		}
	}


	/**
	 * @param int $id
	 * @param int $oasisType
	 */
	public function saveOasisUnits($id, $oasisType)
	{
		$unitsData = [
			'vref' => $id,
		];
		switch ($oasisType) {
			case 1:
			case 2:
				//+25% lumber oasis
				$unitsData['u35'] = rand(5, 10);
				$unitsData['u36'] = rand(0, 5);
				$unitsData['u37'] = rand(0, 5);
				break;
			case 3:
				//+25% lumber and +25% crop oasis
				$unitsData['u35'] = rand(5, 15);
				$unitsData['u36'] = rand(0, 5);
				$unitsData['u37'] = rand(0, 5);
				break;
			case 4:
			case 5:
				//+25% clay oasis
				$unitsData['u31'] = rand(10, 15);
				$unitsData['u32'] = rand(5, 15);
				$unitsData['u35'] = rand(0, 10);
				break;
			case 6:
				//+25% clay and +25% crop oasis
				$unitsData['u31'] = rand(15, 20);
				$unitsData['u32'] = rand(10, 15);
				$unitsData['u35'] = rand(0, 10);
				break;
			case 7:
			case 8:
				//+25% iron oasis
				$unitsData['u31'] = rand(10, 15);
				$unitsData['u32'] = rand(5, 15);
				$unitsData['u34'] = rand(0, 10);
				break;
			case 9:
				//+25% iron and +25% crop oasis
				$unitsData['u31'] = rand(15, 20);
				$unitsData['u32'] = rand(10, 15);
				$unitsData['u34'] = rand(0, 10);
				break;
			case 10:
			case 11:
				//+25% crop oasis
				$unitsData['u31'] = rand(5, 15);
				$unitsData['u33'] = rand(5, 10);
				$unitsData['u37'] = rand(0, 10);
				$unitsData['u39'] = rand(0, 5);
				break;
			case 12:
				//+50% crop oasis
				$unitsData['u31'] = rand(10, 15);
				$unitsData['u33'] = rand(5, 10);
				$unitsData['u38'] = rand(0, 10);
				$unitsData['u39'] = rand(0, 5);
				break;
		}
		$this->unitsModel->add($unitsData);
	}
}