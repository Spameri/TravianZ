<?php

namespace App\InstallModule\Presenters;

use Nette;
use App;

class OasisPresenter extends Nette\Application\UI\Presenter
{
	/** @var App\FrontModule\Model\OData\OasisService @inject */
	public $oasisService;

	public function actionDefault()
	{

	}


	public function renderDefault()
	{

	}

	public function actionPopulate()
	{
		$this->oasisService->populateOasis();

		$this->redirect(':Install:End:default');
	}
}