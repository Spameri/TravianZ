<?php

namespace App\GameModule\Controls\SendUnits;

use Nette;
use App;


class SendUnitsControl extends Nette\Application\UI\Control
{
	/** @var App\GameModule\Model\Units\UnitService */
	private $unitService;
	/** @var array */
	private $units;
	/** @var App\GameModule\DTO\Village */
	private $village;
	/** @var \stdClass */
	private $wdata;
	/** @var App\FrontModule\Model\VData\VillageService */
	private $villageService;
	/** @var App\GameModule\Model\Units\UnitFactory */
	private $unitFactory;
	/** @var App\FrontModule\Model\WData\WDataModel */
	private $WDataModel;


	public function __construct(
		App\GameModule\Model\Units\UnitService $unitService
		, App\FrontModule\Model\VData\VillageService $villageService
		, App\GameModule\Model\Units\UnitFactory $unitFactory
		, App\FrontModule\Model\WData\WDataModel $WDataModel
	) {
		$this->unitService = $unitService;
		$this->villageService = $villageService;
		$this->unitFactory = $unitFactory;
		$this->WDataModel = $WDataModel;
	}


	public function attached($presenter)
	{
		parent::attached($presenter);
		$this->wdata = $this->WDataModel->get($this->presenter->getParameter('destination'));
		$this->template->village = $this->village = $this->villageService->getVillage($this->presenter->getParameter('id'));
		$this->units = $this->unitService->getUnits($this->village);
		$this->template->units = $this->units;
		$this->template->names = $this->unitService->getNames();
		$unitData = [];
		switch($this->village->getOwner()->tribe) {
			case App\FrontModule\Model\User\UserService::TRIBE_ROMANS:
				foreach (App\GameModule\Model\Units\UnitService::ROMANS as $unit) {
					$unitData[] = $this->unitFactory->getUnit($unit);
				}
				break;
			case App\FrontModule\Model\User\UserService::TRIBE_TEUTONS:
				foreach (App\GameModule\Model\Units\UnitService::TEUTONS as $unit) {
					$unitData[] = $this->unitFactory->getUnit($unit);
				}
				break;
			case App\FrontModule\Model\User\UserService::TRIBE_GAULS:
				foreach (App\GameModule\Model\Units\UnitService::GAULS as $unit) {
					$unitData[] = $this->unitFactory->getUnit($unit);
				}
				break;
		}
		$this->template->unitData = $unitData;
		$this->template->setFile(__DIR__ . '/SendUnitsControl.latte');
	}


	public function render()
	{
		$this->template->render();
	}


	protected function createComponentSendUnitsForm()
	{
		$form = new Nette\Application\UI\Form();

		$form->addText('1', '1');
		$form->addText('2', '2');
		$form->addText('3', '3');
		$form->addText('4', '4');
		$form->addText('5', '5');
		$form->addText('6', '6');
		$form->addText('7', '7');
		$form->addText('8', '8');
		$form->addText('9', '9');
		$form->addText('10', '10');
		$form->addText('11', '11');

		$sendTypes = [
			1 => 'Reinforcement',
			2 => 'Normal attack',
			3 => 'Raid',
		];

		$form->addRadioList('type', '', $sendTypes)
			->setDefaultValue(1);

		$form->addText('village', 'Village');

		$form->addText('x', 'X')
			->setDefaultValue($this->wdata->x);

		$form->addText('y', 'Y')
			->setDefaultValue($this->wdata->y);

		$form->addSubmit('ok', 'OK');

		$form->onSuccess[] = [$this, 'renderReview'];

		return $form;
	}


	public function renderReview($form)
	{
		\Tracy\Debugger::barDump($form);
		\Tracy\Debugger::barDump($this->units);
		$this->template->data = $form->getValues();
		if ($this->wdata->occupied) {
			$destination = $this->villageService->getVillage($this->wdata->id);
		} else {
			$destination = FALSE;
		}
		$this->template->destination = $destination;
		$this->template->wdata = $this->wdata;
		$this->template->setFile(__DIR__ . '/ReviewUnits.latte');
	}
}