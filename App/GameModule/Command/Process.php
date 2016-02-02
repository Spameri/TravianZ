<?php

namespace App\GameModule\Command;

use Symfony;
use App;

class Process extends Symfony\Component\Console\Command\Command
{
	/**
	 * @var App\GameModule\Model\Event\ProcessEvents
	 */
	private $processEvents;


	public function __construct(App\GameModule\Model\Event\ProcessEvents $processEvents)
	{
		$this->processEvents = $processEvents;
	}


	protected function configure()
	{
		$this->setName('game:process');
	}


	protected function execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output)
	{
		$start = time();
		$this->processEvents->process();
		$end = time();
		if (($end - $start) < 2) {
			sleep(1);
		}
	}
}