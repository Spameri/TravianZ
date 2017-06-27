<?php

namespace App\GameModule\Command;

use Symfony;
use App;

class ProcessCulturePoints extends Symfony\Component\Console\Command\Command
{
	/**
	 * @var App\GameModule\Model\Event\ProcessCulturePoints
	 */
	private $culturePoints;


	public function __construct(App\GameModule\Model\Event\ProcessCulturePoints $culturePoints)
	{
		parent::__construct();
		$this->culturePoints = $culturePoints;
	}


	protected function configure()
	{
		$this->setName('game:processCulturePoints');
	}


	protected function execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output)
	{
		$this->culturePoints->process();
	}
}