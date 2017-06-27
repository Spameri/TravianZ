<?php

namespace App\InstallModule\Presenters;

use Nette;
use App;

class MultihunterPresenter extends Nette\Application\UI\Presenter
{
	/** @var App\FrontModule\Model\User\RegisterService @inject */
	public $registerService;


	public function actionDefault()
	{

	}


	public function renderDefault()
	{

	}


	public function createComponentRegisterMultihunter()
	{
		$form = new Nette\Application\UI\Form();

		$form->addText('name', 'Name')
			->setDefaultValue('Multihunter')
			->setRequired();

		$form->addPassword('password', 'Password')
			->setRequired();

		$form->addSubmit('submit', 'Create');

		$form->onSuccess[] = [$this, 'processRegisterMultihunter'];

		return $form;
	}


	public function processRegisterMultihunter(Nette\Application\UI\Form $form)
	{
		$this->registerService->createMultihunter($form->getValues());

		$this->redirect(':Install:Oasis:default');
	}
}