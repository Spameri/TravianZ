<?php

namespace App\GameModule\Controls\Header;

use Nette;
use App;

class HeaderControl extends Nette\Application\UI\Control
{
	/**
	 * @var App\GameModule\Model\MData\MDataModel
	 */
	private $MDataModel;
	/**
	 * @var App\GameModule\Model\NData\NDataModel
	 */
	private $NDataModel;
	/**
	 * @var App\FrontModule\Model\User\UserService
	 */
	private $userService;
	/**
	 * @var App\FrontModule\Model\VData\VDataModel
	 */
	private $VDataModel;


	public function __construct(
		App\GameModule\Model\MData\MDataModel $MDataModel,
		App\GameModule\Model\NData\NDataModel $NDataModel,
		App\FrontModule\Model\User\UserService $userService,
		App\FrontModule\Model\VData\VDataModel $VDataModel
	) {
		$this->MDataModel = $MDataModel;
		$this->NDataModel = $NDataModel;
		$this->userService = $userService;
		$this->VDataModel = $VDataModel;
	}


	public function render()
	{
		$id = $this->presenter->getParameter('id');
		if ( ! $id) {
			/** @var \stdClass $field */
			$field = $this->VDataModel->getByUser($this->presenter->user->getId());
			$id = $field->wref;
		}
		$this->template->villageId = $id;
		$this->template->unread = $this->MDataModel->countUnread($this->presenter->getUser()->getId()) ? TRUE : FALSE;
		$this->template->report = $this->NDataModel->countUnread($this->presenter->getUser()->getId()) ? TRUE : FALSE;
		$this->template->plusActive = $this->userService->hasPlus($this->presenter->getUser()->getId());
		$this->template->setFile(__DIR__ . '/HeaderControl.latte');
		$this->template->render();
	}
}