<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class MapPresenter extends GamePresenter
{
	/** @var App\FrontModule\Model\WData\WDataModel @inject */
	public $WDataModel;

	/** @var App\FrontModule\Model\VData\VillageService @inject */
	public $villageService;

	/** @var App\GameModule\Model\Diplomacy\DiplomacyModel @inject */
	public $diplomacyModel;

	/** @var App\GameModule\Model\Units\UnitsModel @inject */
	public $unitsModel;

	/** @var App\GameModule\Model\Units\UnitService @inject */
	public $unitService;

	/** @var App\GameModule\Model\NData\ReportService @inject */
	public $reportService;

	/** @var App\GameModule\Model\Building\BuildingService @inject */
	public $buildingService;

	public function startup()
	{
		parent::startup();

		if ($id = $this->getParameter('id')) {
			$village = $this->villageService->getVillage($id);
			if ( ! $village->getOwner() || $village->getOwner()->id !== $this->user->id) {
				$this->redirect(':Game:OuterVillage:default');
			}
		}
	}


	public function actionDefault($id, $wref)
	{

	}


	public function renderDefault($id, $wref)
	{
		$this->template->id = $id;
		$this->template->wdata = $center = $this->WDataModel->get($wref);

		$xMax = $center->x + 3;
		$xMin = $center->x - 3;
		$yMax = $center->y + 3;
		$yMin = $center->y - 3;

		$fields = $this->WDataModel->getMapData($xMax, $xMin, $yMax, $yMin);
		$fieldData = [];
		foreach ($fields as $field) {
			$key = ($xMax - $field->x) . '_' . ($yMax - $field->y);
			if ($field->occupied === 1) {
				$field->image = $this->getVillageImage($field);
				$field->village = $this->villageService->getVillage($field->id);
			}
			$fieldData[$key] = $field;
		}
		$this->template->fieldData = $fieldData;

		$mapRulers['x6'] = $xMin;
		$mapRulers['x5'] = $xMin + 1;
		$mapRulers['x4'] = $xMin + 2;
		$mapRulers['x3'] = $xMin + 3;
		$mapRulers['x2'] = $xMin + 4;
		$mapRulers['x1'] = $xMin + 5;
		$mapRulers['x0'] = $xMax;

		$mapRulers['y6'] = $yMin;
		$mapRulers['y5'] = $yMin + 1;
		$mapRulers['y4'] = $yMin + 2;
		$mapRulers['y3'] = $yMin + 3;
		$mapRulers['y2'] = $yMin + 4;
		$mapRulers['y1'] = $yMin + 5;
		$mapRulers['y0'] = $yMax;

		$this->template->ruler = $mapRulers;

		$WData = $this->WDataModel->getByCoordinates($center->x, ($center->y - 1));
		$this->template->oneNorth = $WData->id;
		$WData = $this->WDataModel->getByCoordinates($center->x, ($center->y + 1));
		$this->template->oneSouth = $WData->id;
		$WData = $this->WDataModel->getByCoordinates(($center->x + 1), $center->y);
		$this->template->oneWest = $WData->id;
		$WData = $this->WDataModel->getByCoordinates(($center->x - 1), $center->y);
		$this->template->oneEast = $WData->id;

		$WData = $this->WDataModel->getByCoordinates($center->x, ($center->y - 7));
		$this->template->jumpNorth = $WData->id;
		$WData = $this->WDataModel->getByCoordinates($center->x, ($center->y + 7));
		$this->template->jumpSouth = $WData->id;
		$WData = $this->WDataModel->getByCoordinates(($center->x + 7), $center->y);
		$this->template->jumpWest = $WData->id;
		$WData = $this->WDataModel->getByCoordinates(($center->x - 7), $center->y);
		$this->template->jumpEast = $WData->id;
	}


	public function getVillageImage($field)
	{
		$village = $this->villageService->getVillage($field->id);
		$image = 'b0';
		if ($village->getOwner()->id === $this->getUser()->getId()) {
			if ($village->getPopulation() >= 100) {
				if ($village->getPopulation() >= 250) {
					if ($village->getPopulation() >= 500) {
						$image = 'b3';
					} else {
						$image = 'b2';
					}
				} else {
					$image = 'b1';
				}
			}
		}
		if ($village->getOwner()->alliance !== 0 && $this->getUser()->alliance !== 0) {
			if ($this->diplomacyModel->atAlliance($village->getOwner()->alliance, $this->getUser()->alliance)) {
				$type = 1;

			} elseif ($this->diplomacyModel->atAlliance($village->getOwner()->alliance, $this->getUser()->alliance)) {
				$type = 2;

			} elseif ($village->getOwner()->alliance === $this->getUser()->alliance) {
				$type = 3;

			} else {
				$type = 5;
			}
		} else {
			$type = 4;
		}

		return $image . $type;
	}


	public function createComponentMove()
	{
		$form = new Nette\Application\UI\Form();

		$form->addText('x', 'X: ')
			->setMaxLength(4)
			->setRequired();
		$form->addText('y', 'Y: ')
			->setMaxLength(4)
			->setRequired();
		$form->addSubmit('ok', 'OK');

		$form->onSuccess[] = [$this, 'handleMove'];

		return $form;
	}


	public function handleMove(Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		$WData = $this->WDataModel->getByCoordinates($values->x, $values->y);

		$this->redirect(':Game:Map:default', [$this->getParameter('id'), $WData->id]);
	}


	/**
	 * @param int $id
	 * @param int $wid
	 */
	public function actionDetail($id, $wid)
	{
		$this->template->id = $id;
		$village = $this->villageService->getVillage($id);
		/** @var \stdClass $wdata */
		$this->template->wdata = $wdata = $this->WDataModel->get($wid);
		$this->template->reports = $this->reportService->getLastReportsForUser($wid, $this->user->getId());
		$this->template->rallyPoint = $this->buildingService->isBuilt($village, App\GameModule\Model\Building\BuildingModel::RALLY_POINT);
		if ($wdata->occupied === 1) {
			$this->template->village = $this->villageService->getVillage($wid);
		} else {
			$this->template->village = FALSE;
		}
		if ($wdata->oasistype != 0 && $wdata->occupied == 0) {
			$this->template->units = $this->unitsModel->get($wid);
			$this->template->unitNames = $this->unitService->getNames();

		} else {
			$this->template->units = [];
		}
	}
}