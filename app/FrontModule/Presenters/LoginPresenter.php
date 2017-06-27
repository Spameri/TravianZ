<?php

namespace App\FrontModule\Presenters;


class LoginPresenter extends \Nette\Application\UI\Presenter
{

	/**
	 * @var \App\FrontModule\Model\User\LoginService @inject
	 */
	public $loginService;


	public function actionDefault()
	{

	}


	public function renderDefault()
	{

	}


	protected function createComponentLoginForm() : \Nette\Application\UI\Form
	{
		$form = new \Nette\Application\UI\Form();

		$form->addText('nickname', 'Nickname')
			->setRequired();

		$form->addPassword('password', 'Password')
			->setRequired();

		$form->addSubmit('login', 'Login');

		$form->onSuccess[] = [$this, 'processLogin'];

		return $form;
	}


	public function processLogin(\Nette\Application\UI\Form $form)
	{
		$values = $form->getValues();

		$this->getUser()->setExpiration('14 days', FALSE);

		try {
			$this->getUser()->login($this->loginService->authenticate($values->nickname, $values->password));

			$this->loginService->setOnline($this->getUser()->getId());

			$this->redirect(':Game:InnerVillage:default');

		} catch (\Nette\Security\AuthenticationException $e) {
			$this->flashMessage($e->getMessage(), 'red');
		}
	}
}
