<?php

namespace App\GameModule\Controls\Building;

use Nette;
use App;

class BuildingControl extends Nette\Application\UI\Control
{
    /**
     * @var App\GameModule\Model\BData\BDataModel
     */
    private $BDataModel;
    /**
     * @var App\FrontModule\Model\VData\VillageService
     */
    private $villageService;
    /**
     * @var App\FrontModule\Model\VData\VDataModel
     */
    private $VDataModel;
    /**
     * @var App\GameModule\Model\Building\BuildingModel
     */
    private $buildingModel;


    function __construct(
        App\GameModule\Model\BData\BDataModel $BDataModel,
        App\FrontModule\Model\VData\VillageService $villageService,
        App\FrontModule\Model\VData\VDataModel $VDataModel,
        App\GameModule\Model\Building\BuildingModel $buildingModel
    ) {
        $this->BDataModel = $BDataModel;
        $this->villageService = $villageService;
        $this->VDataModel = $VDataModel;
        $this->buildingModel = $buildingModel;
    }

    public function render()
    {
        $id = $this->presenter->getParameter('id');
        if ( ! $id) {
            /** @var \stdClass $field */
            $field = $this->VDataModel->getByUser($this->presenter->user->getId());
            $id = $field->wref;
        }
        $this->template->buildings = $this->BDataModel->getBuildingQueue($id);
        $this->template->village = $this->villageService->getVillage($id);
        $this->template->names = $this->buildingModel->getAll();

        $this->template->setFile(__DIR__ . '/BuildingControl.latte');
        $this->template->render();
    }
}