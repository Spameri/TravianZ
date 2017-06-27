<?php

namespace App\InstallModule\Presenters;

use Nette;

class DataFormPresenter extends Nette\Application\UI\Presenter
{
	/** @var \App\InstallModule\Model\InstallService @inject */
	public $installService;


	public function actionDefault()
	{

	}

	public function renderDefault()
	{

	}

	public function actionCreateDatabase()
	{
		$this->installService->createDatabase();

		$this->redirect(':Install:Field:default');
	}
}