<?php

namespace App\FrontModule\Presenters;

use App;
use Nette;

class RegisterPresenter extends Nette\Application\UI\Presenter
{
	/** @var App\FrontModule\Model\User\UserModel @inject */
	public $userModel;

	/** @var App\FrontModule\Model\User\RegisterService @inject */
	public $registerService;

	public function actionDefault()
	{

	}


	public function renderDefault()
	{

	}

	protected function createComponentRegisterForm()
	{
		$form = new Nette\Application\UI\Form();

		$form->addText('nickname', 'Nickname')
			->setRequired();

		$form->addText('email', 'Email')
			->setRequired();

		$form->addPassword('password', 'Password')
			->setRequired();

		$form->addRadioList('tribe', 'Choose tribe', [
			1 => 'Romans',
			2 => 'Teutons',
			3 => 'Gauls',
		])
			->setRequired();

		$form->addRadioList('position', 'Starting position', [
			0 => 'Random',
			1 => 'North west (+|-)',
			2 => 'South west (-|-)',
			3 => 'North east (+|+)',
			4 => 'South east (+|-)',
		])
			->setDefaultValue(0)
			->setRequired();

		$form->addCheckbox('accept', 'I accept the game rules and general terms and conditions.')
			->setRequired();

		$form->addSubmit('signup', 'Signup');

		$form->onSuccess[] = [$this, 'processRegistration'];

		return $form;
	}


	public function processRegistration(Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		$existingUser = $this->userModel->getByEmail($values->email);
		if ($existingUser) {
			$this->flashMessage('Email allready exists');
			$this->redirect(':Front:Register:default');
		}

		$this->registerService->createUser($values);

		$this->redirect(':Front:Login:default');
	}
}