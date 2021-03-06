<?php

namespace App\GameModule\Model\Units;

use Nette;
use App;

class UnitService
{
	const LEGIONNAIRE = 1;
	const PRAETORIAN = 2;
	const IMPERIAN = 3;
	const EQUITES_LEGATI = 4;
	const EQUITES_IMPERATORIS = 5;
	const EQUITES_CEASARIS = 6;
	const BATTERING_RAM = 7;
	const FIRE_CATAPULT = 8;
	const SENATOR = 9;
	const SETTLER = 10;

	const ROMANS = [
		self::LEGIONNAIRE,
		self::PRAETORIAN,
		self::IMPERIAN,
		self::EQUITES_LEGATI,
		self::EQUITES_IMPERATORIS,
		self::EQUITES_CEASARIS,
		self::BATTERING_RAM,
		self::FIRE_CATAPULT,
		self::SENATOR,
		self::SETTLER,
	];

	const MACEMAN = 11;
	const SPEARMAN = 12;
	const AXEMAN = 13;
	const SCOUT = 14;
	const PALADIN = 15;
	const TEUTONIC_KNIGHT = 16;
	const RAM_TEUTON = 17;
	const CATAPULT_TEUTON = 18;
	const CHIEF_TEUTON = 19;
	const SETTLER_TEUTON = 20;

	const TEUTONS = [
		self::MACEMAN,
		self::SPEARMAN,
		self::AXEMAN,
		self::SCOUT,
		self::PALADIN,
		self::TEUTONIC_KNIGHT,
		self::RAM_TEUTON,
		self::CATAPULT_TEUTON,
		self::CHIEF_TEUTON,
		self::SETTLER_TEUTON,
	];

	const PHALANX = 21;
	const SWORDSMAN = 22;
	const PATHFINDER = 23;
	const THEUTATES_THUNDER = 24;
	const DRUIDRIDER = 25;
	const HAEDUAN = 26;
	const RAM_GAUL = 27;
	const TREBUCHET = 28;
	const CHIEFTAIN = 29;
	const SETTLER_GAUL = 30;

	const GAULS = [
		self::PHALANX,
		self::SWORDSMAN,
		self::PATHFINDER,
		self::THEUTATES_THUNDER,
		self::DRUIDRIDER,
		self::HAEDUAN,
		self::RAM_GAUL,
		self::TREBUCHET,
		self::CHIEFTAIN,
		self::SETTLER_GAUL,
	];

	const RAT = 31;
	const SPIDER = 32;
	const SERPENT = 33;
	const BAT = 34;
	const WILD_BOAR = 35;
	const WOLF = 36;
	const BEAR = 37;
	const CROCODILE = 38;
	const TIGER = 39;
	const ELEPHANT = 40;

	const NATURE = [
		self::RAT,
		self::SPIDER,
		self::SERPENT,
		self::BAT,
		self::WILD_BOAR,
		self::WOLF,
		self::BEAR,
		self::CROCODILE,
		self::TIGER,
		self::ELEPHANT,
	];

	const PIKEMAN = 41;
	const THORNED_WARRIOR = 42;
	const GUARDSMAN = 43;
	const BIRDS_OF_PREY = 44;
	const AXERIDER = 45;
	const NATARIAN_KNIGHT = 46;
	const WAR_ELEPHANT = 47;
	const BALLISTA = 48;
	const NATARIAN_EMPEROR = 49;
	const SETTLER_NATAR = 50;

	const NATARS = [
		self::PIKEMAN,
		self::THORNED_WARRIOR,
		self::GUARDSMAN,
		self::BIRDS_OF_PREY,
		self::AXERIDER,
		self::NATARIAN_KNIGHT,
		self::WAR_ELEPHANT,
		self::BALLISTA,
		self::NATARIAN_EMPEROR,
		self::SETTLER_NATAR,
	];

	const PEON = 51;
	const HUNTER = 52;
	const WARRIOR = 53;
	const HYDRA = 54;
	const STEED = 55;
	const WAR_STEED = 56;
	const RAM_BARBARIAN = 57;
	const CATAPULT_BARBARIAN = 58;
	const CHIEF_BARBARIAN = 59;
	const SETTLER_BARBARIAN = 60;

	const BARBARIANS = [
		self::PEON,
		self::HUNTER,
		self::WARRIOR,
		self::HYDRA,
		self::STEED,
		self::WAR_STEED,
		self::RAM_BARBARIAN,
		self::CATAPULT_BARBARIAN,
		self::CHIEF_BARBARIAN,
		self::SETTLER_BARBARIAN,
	];

	const INFANTRY = [
		self::LEGIONNAIRE,
		self::PRAETORIAN,
		self::IMPERIAN,
		self::MACEMAN,
		self::SPEARMAN,
		self::AXEMAN,
		self::SCOUT,
		self::PHALANX,
		self::SWORDSMAN,
		self::RAT,
		self::SPIDER,
		self::SERPENT,
		self::BAT,
		self::PIKEMAN,
		self::THORNED_WARRIOR,
		self::GUARDSMAN,
		self::PEON,
		self::HUNTER,
		self::WARRIOR,
		self::HYDRA,
	];

	const CALVARY = [
		self::EQUITES_LEGATI,
		self::EQUITES_IMPERATORIS,
		self::EQUITES_CEASARIS,
		self::PALADIN,
		self::TEUTONIC_KNIGHT,
		self::PATHFINDER,
		self::THEUTATES_THUNDER,
		self::DRUIDRIDER,
		self::HAEDUAN,
		self::WILD_BOAR,
		self::WOLF,
		self::BEAR,
		self::CROCODILE,
		self::TIGER,
		self::ELEPHANT,
		self::BIRDS_OF_PREY,
		self::STEED,
		self::WAR_STEED,
	];

	const SPY = [
		self::EQUITES_LEGATI,
		self::SCOUT,
		self::PATHFINDER,
		self::BIRDS_OF_PREY,
		self::HYDRA,
	];

	const RAM = [
		self::BATTERING_RAM,
		self::RAM_TEUTON,
		self::RAM_GAUL,
		self::WAR_ELEPHANT,
		self::RAM_BARBARIAN,
	];

	const CATAPULT = [
		self::FIRE_CATAPULT,
		self::CATAPULT_TEUTON,
		self::TREBUCHET,
		self::BALLISTA,
		self::CATAPULT_BARBARIAN,
	];

	const CHIEF = [
		self::SENATOR,
		self::CHIEF_TEUTON,
		self::CHIEFTAIN,
		self::NATARIAN_EMPEROR,
		self::CHIEF_BARBARIAN,
	];

	const EXPANSION = [
		self::SETTLER,
		self::SETTLER_TEUTON,
		self::SETTLER_GAUL,
		self::SETTLER_NATAR,
		self::SETTLER_BARBARIAN,
	];

	/**
	 * @var App\GameModule\Model\Units\UnitModel
	 */
	private $unitModel;
	/**
	 * @var UnitsModel
	 */
	private $unitsModel;
	/**
	 * @var TrainingModel
	 */
	private $trainingModel;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;
	/**
	 * @var App\GameModule\Model\Building\BuildingService
	 */
	private $buildingService;
	/**
	 * @var UnitFactory
	 */
	private $unitFactory;


	public function __construct(
		UnitModel $unitModel
		, UnitsModel $unitsModel
		, TrainingModel $trainingModel
		, App\FrontModule\Model\VData\VDataModel $VDataModel
		, App\GameModule\Model\Building\BuildingService $buildingService
		, UnitFactory $unitFactory
	){
		$this->unitModel = $unitModel;
		$this->unitsModel = $unitsModel;
		$this->trainingModel = $trainingModel;
		$this->VDataModel = $VDataModel;
		$this->buildingService = $buildingService;
		$this->unitFactory = $unitFactory;
	}


	/**
	 * @param App\GameModule\Controls\Train\TrainControl $form
	 * @param \stdClass $values
	 * @param App\GameModule\DTO\Village $village
	 */
	public function train($form, $values, $village)
	{
		/** @var App\GameModule\DTO\Unit $unit */
		foreach ($form->getUnits() as $unit) {
			if ($values->{$unit->getId() . 'number'} > 0) {
				$trainable = $this->getTrainableUnit($village, $unit);
				if ($trainable > $values->{$unit->getId() . 'number'}) {
					$amount = $values->{$unit->getId() . 'number'};

				} else {
					$amount = $trainable;
				}
				if ($amount == 0) {
					continue;
				}

				$this->VDataModel->update($village->getId(), [
					'wood' => $village->getActualWood() - $amount * $unit->getWood(),
					'clay' => $village->getActualClay() - $amount * $unit->getClay(),
					'iron' => $village->getActualIron() - $amount * $unit->getIron(),
					'crop' => $village->getActualCrop() - $amount * $unit->getCrop(),
				]);
				$training = FALSE;
				if (in_array($unit->getId(), self::INFANTRY)) {
					$training = $this->trainingModel->getByBuilding($village, App\GameModule\Model\Building\BuildingModel::BARRACKS);

				} elseif (in_array($unit->getId(), self::CALVARY)) {
					$training = $this->trainingModel->getByBuilding($village, App\GameModule\Model\Building\BuildingModel::STABLE);

				} elseif (in_array($unit->getId(), self::RAM) || in_array($unit->getId(), self::CATAPULT)) {
					$training = $this->trainingModel->getByBuilding($village, App\GameModule\Model\Building\BuildingModel::WORKSHOP);

				} elseif (in_array($unit->getId(), self::CHIEF) || in_array($unit->getId(), self::EXPANSION)) {
					$training = $this->trainingModel->getByBuilding($village, App\GameModule\Model\Building\BuildingModel::RESIDENCE);
				}
				if ($training) {
					$last = end($training);
					$time = $last->timestamp + ($last->eachtime * $last->amt);
				} else {
					$time = time();
				}

				$this->trainingModel->add([
					'vref' => $village->getId(),
					'unit' => $unit->getId(),
					'amt' => $amount,
					'timestamp' => $time,
					'eachtime' => $unit->getTime(),
					'timestamp2' => $time,
				]);
			}
		}
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param int $building
	 * @return array
	 */
	public function getAvailableUnits($village, $building)
	{
		$units = [];
		if ($village->getOwner()->tribe === App\FrontModule\Model\User\UserService::TRIBE_ROMANS) {
			switch ($building) {
				case App\GameModule\Model\Building\BuildingModel::BARRACKS:
					$barracks = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::BARRACKS);
					$units[] = $this->unitFactory->getUnit(self::LEGIONNAIRE, $barracks);
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::STABLE:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::WORKSHOP:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::RESIDENCE:
					$residence = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::RESIDENCE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER, $residence);
					break;

				case App\GameModule\Model\Building\BuildingModel::PALACE:
					$palace = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::PALACE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER, $palace);
					break;
			}

		} elseif ($village->getOwner()->tribe === App\FrontModule\Model\User\UserService::TRIBE_TEUTONS) {
			switch ($building) {
				case App\GameModule\Model\Building\BuildingModel::BARRACKS:
					$barracks = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::BARRACKS);
					$units[] = $this->unitFactory->getUnit(self::MACEMAN, $barracks);
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::STABLE:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::WORKSHOP:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::RESIDENCE:
					$residence = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::RESIDENCE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER_TEUTON, $residence);
					break;

				case App\GameModule\Model\Building\BuildingModel::PALACE:
					$palace = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::PALACE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER_TEUTON, $palace);
					break;
			}

		} elseif ($village->getOwner()->tribe === App\FrontModule\Model\User\UserService::TRIBE_GAULS) {
			switch ($building) {
				case App\GameModule\Model\Building\BuildingModel::BARRACKS:
					$barracks = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::BARRACKS);
					$units[] = $this->unitFactory->getUnit(self::PHALANX, $barracks);
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::STABLE:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::WORKSHOP:
					// TODO RESEARCH
					break;

				case App\GameModule\Model\Building\BuildingModel::RESIDENCE:
					$residence = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::RESIDENCE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER_GAUL, $residence);
					break;

				case App\GameModule\Model\Building\BuildingModel::PALACE:
					$palace = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::PALACE);
					$units[] = $this->unitFactory->getUnit(self::SETTLER_GAUL, $palace);
					break;
			}
		}

		return $units;
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param array $units
	 * @return array
	 */
	public function getTrainableUnits($village, $units)
	{
		$trainable = [];
		/** @var App\GameModule\DTO\Unit $unit */
		foreach ($units as $unit) {
			$trainable[$unit->getId()] = $this->getTrainableUnit($village, $unit);
		}

		return $trainable;
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @param App\GameModule\DTO\Unit $unit
	 * @return int
	 */
	public function getTrainableUnit($village, $unit)
	{
		$wood = floor($village->getActualWood() / $unit->getWood());
		$clay = floor($village->getActualClay() / $unit->getClay());
		$iron = floor($village->getActualIron() / $unit->getIron());
		$crop = floor($village->getActualCrop() / $unit->getCrop());
		return min($wood, $clay, $iron, $crop);
	}


	/**
	 * @param App\GameModule\DTO\Village $village
	 * @return \Dibi\Row|FALSE
	 */
	public function getUnits($village)
	{
		$unitData = $this->unitsModel->get($village->getId());

		return $unitData;
	}


	/**
	 * @return array
	 */
	public function getNames()
	{
		return $this->unitModel->getNames();
	}
}