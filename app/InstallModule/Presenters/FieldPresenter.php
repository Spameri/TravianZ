<?php

namespace App\InstallModule\Presenters;

use Nette;
use App;

class FieldPresenter extends Nette\Application\UI\Presenter
{
	/** @var App\InstallModule\Model\WorldGenerator @inject */
	public $worldGenerator;


	public function actionDefault()
	{

	}


	public function renderDefault()
	{

	}

	public function actionGenerate()
	{
		$this->worldGenerator->generate();

		$this->redirect(':Install:Multihunter:default');
	}
}