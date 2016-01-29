<?php

namespace App\GameModule\Presenters;

use App;
use Nette;

class GamePresenter extends Nette\Application\UI\Presenter
{
	use App\GameModule\Controls\Header\THeaderControl;
	use App\GameModule\Controls\Resource\TResourceControl;


	public function beforeRender()
	{
		if ( ! $this->user->isLoggedIn()) {
			$this->redirect(':Front:Homepage:default');
		}
	}
}