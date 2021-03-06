<?php

namespace App\GameModule\Controls\BuildingDetail;

use Nette;
use App;

class BuildingDetailControl extends Nette\Application\UI\Control
{
	/**
	 * @var App\GameModule\Model\Units\UnitService
	 */
	private $unitService;
	/**
	 * @var App\GameModule\Controls\Train\ITrainControl
	 */
	private $trainControl;
	/**
	 * @var App\FrontModule\Model\VData\VillageService
	 */
	private $villageService;
	/**
	 * @var array
	 */
	private $units;
	/**
	 * @var App\GameModule\DTO\Village
	 */
	private $village;
	/**
	 * @var App\GameModule\Model\Units\TrainingModel
	 */
	private $trainingModel;
	/**
	 * @var App\GameModule\Model\Units\UnitFactory
	 */
	private $unitFactory;


	public function __construct(
		App\GameModule\Model\Units\UnitService $unitService
		, App\GameModule\Controls\Train\ITrainControl $trainControl
		, App\FrontModule\Model\VData\VillageService $villageService
		, App\GameModule\Model\Units\TrainingModel $trainingModel
		, App\GameModule\Model\Units\UnitFactory $unitFactory
	)
	{
		$this->unitService = $unitService;
		$this->trainControl = $trainControl;
		$this->villageService = $villageService;
		$this->trainingModel = $trainingModel;
		$this->unitFactory = $unitFactory;
	}


	public function attached($presenter)
	{
		parent::attached($presenter);
		$this->template->current = $this->presenter->template->current;
		$this->template->next = $this->presenter->template->next;

		$this->village = $this->villageService->getVillage($this->presenter->getParameter('id'));
		$building = $this->presenter->getParameter('building');
		switch ($building) {
			case App\GameModule\Model\Building\BuildingModel::WOODCUTTER:
			case App\GameModule\Model\Building\BuildingModel::CLAY_PIT:
			case App\GameModule\Model\Building\BuildingModel::IRON_MINE:
			case App\GameModule\Model\Building\BuildingModel::CROPLAND:
				$this->renderResourceField();
				break;

			case App\GameModule\Model\Building\BuildingModel::WAREHOUSE:
			case App\GameModule\Model\Building\BuildingModel::CRANNY:
			case App\GameModule\Model\Building\BuildingModel::GRANARY:
			case App\GameModule\Model\Building\BuildingModel::TRAPPER:
				$this->renderCapacity();
				break;

			case App\GameModule\Model\Building\BuildingModel::MAIN_BUILDING:
				$this->renderMainBuilding();
				break;

			case App\GameModule\Model\Building\BuildingModel::BARRACKS:
				$this->renderBarracks();
				break;

			case App\GameModule\Model\Building\BuildingModel::STABLE:
				$this->renderStable();
				break;

			case App\GameModule\Model\Building\BuildingModel::ACADEMY:
				$this->renderAcademy();
				break;

			case App\GameModule\Model\Building\BuildingModel::ARMOURY:
				$this->renderArmoury();
				break;

			case App\GameModule\Model\Building\BuildingModel::BLACKSMITH:
				$this->renderBlacksmith();
				break;

			case App\GameModule\Model\Building\BuildingModel::MARKET_PLACE:
				$this->renderMarketPlace();
				break;

			case App\GameModule\Model\Building\BuildingModel::EMBASSY:
				$this->renderEmbassy();
				break;

			case App\GameModule\Model\Building\BuildingModel::HERO_MANSION:
				$this->renderHeroMansion();
				break;

			case App\GameModule\Model\Building\BuildingModel::RALLY_POINT:
				$this->renderRallyPoint();
				break;

			default:
				$this->template->setFile(__DIR__ . '/Template/Blank.latte');
				break;
		}
	}


	public function render()
	{
		$this->template->render();
	}


	public function renderBarracks()
	{
		$this->units = $this->unitService->getAvailableUnits($this->village, App\GameModule\Model\Building\BuildingModel::BARRACKS);
		$this->template->units = $this->units;
		$this->template->available = $this->unitService->getTrainableUnits($this->village, $this->units);
		$this->template->current = $this->unitService->getUnits($this->village);
		$queue = $this->trainingModel->getByBuilding($this->village, App\GameModule\Model\Building\BuildingModel::BARRACKS);
		foreach ($queue as $item) {
			$item->unit = $this->unitFactory->getUnit($item->unit);
		}
		$this->template->queue = $queue;

		$this->template->setFile(__DIR__ . '/Template/Barracks.latte');
	}


	public function createComponentTrainBarracks()
	{
		/** @var App\GameModule\Controls\Train\TrainControl|Nette\Application\UI\Form $form */
		$form = $this->trainControl->create($this->units);

		$form->onSuccess[] = [$this, 'train'];

		return $form;
	}


	/**
	 * @param App\GameModule\Controls\Train\TrainControl $form
	 * @param \stdClass $values
	 */
	public function train($form, $values)
	{
		$this->unitService->train($form, $values, $this->village);

		$this->redirect('this');
	}


	public function renderResourceField()
	{
		$this->template->setFile(__DIR__ . '/Template/ResourceField.latte');
	}


	public function renderMainBuilding()
	{
		$this->template->setFile(__DIR__ . '/Template/MainBuilding.latte');
	}


	public function renderCapacity()
	{
		$this->template->setFile(__DIR__ . '/Template/Capacity.latte');
	}

	public function renderAcademy()
	{
		$this->template->setFile(__DIR__ . '/Template/Academy.latte');
	}

	public function renderArmoury()
	{
		$this->template->setFile(__DIR__ . '/Template/Armoury.latte');
	}

	public function renderBlacksmith()
	{
		$this->template->setFile(__DIR__ . '/Template/Blacksmith.latte');
	}

	public function renderStable()
	{
		$this->units = $this->unitService->getAvailableUnits($this->village, App\GameModule\Model\Building\BuildingModel::STABLE);
		$this->template->units = $this->units;
		$this->template->available = $this->unitService->getTrainableUnits($this->village, $this->units);
		$this->template->current = $this->unitService->getUnits($this->village);
		$queue = $this->trainingModel->getByBuilding($this->village, App\GameModule\Model\Building\BuildingModel::STABLE);
		foreach ($queue as $item) {
			$item->unit = $this->unitFactory->getUnit($item->unit);
		}
		$this->template->queue = $queue;

		$this->template->setFile(__DIR__ . '/Template/Stable.latte');
	}

	public function renderEmbassy()
	{
		$this->template->setFile(__DIR__ . '/Template/Embassy.latte');
	}

	public function renderMarketPlace()
	{
		$this->template->setFile(__DIR__ . '/Template/MarketPlace.latte');
	}

	public function renderHeroMansion()
	{
		$this->template->setFile(__DIR__ . '/Template/HeroMansion.latte');
	}

	public function renderRallyPoint()
	{
		$this->template->setFile(__DIR__ . '/Template/RallyPoint.latte');
	}
}