<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class GamePresenter extends Nette\Application\UI\Presenter
{
	use App\GameModule\Controls\Header\THeaderControl;
	use App\GameModule\Controls\Resource\TResourceControl;

	/** @var App\GameModule\Model\Event\ProcessEvents @inject */
	public $processEvent;

	public function startup()
	{
		parent::startup();

		if ( ! $this->user->isLoggedIn()) {
			$this->redirect(':Front:Homepage:default');
		}

		// TODO temporary solution
		// TODO this works only for one user
		// TODO call this only from daemon like supervisor
		$this->processEvent->process();
	}
}