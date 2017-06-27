<?php

namespace App\GameModule\Model\Event;

use App;
use Kdyby;

class ProcessTraining
{
	/**
	 * @var App\GameModule\Model\Units\TrainingModel
	 */
	private $trainingModel;
	/**
	 * @var App\GameModule\Model\Units\UnitsModel
	 */
	private $unitsModel;


	public function __construct(
		App\GameModule\Model\Units\TrainingModel $trainingModel
		, App\GameModule\Model\Units\UnitsModel $unitsModel
	) {
		$this->unitsModel = $unitsModel;
		$this->trainingModel = $trainingModel;
	}


	public function process($time)
	{
		$trainData = $this->trainingModel->getProcessData($time);
		foreach ($trainData as $single) {
			if ($single->timestamp2 < ($time + $single->eachtime)) {
				$diff = $time - $single->timestamp2;
				$amount = floor($diff / $single->eachtime);
				if ($amount > $single->amt) {
					$amount = $single->amt;
				}
				$remaining = $single->amt - $amount;
				if ($remaining < 1) {
					$this->trainingModel->delete($single->id);
				} else {
					$this->trainingModel->update($single->id, [
						'amt' => $remaining,
						'timestamp2' => $single->timestamp2 + ($single->eachtime * $amount)
					]);
				}
				/** @var \stdClass $units */
				$units = $this->unitsModel->get($single->vref);
				$unitName = 'u' . $single->unit;
				if ($units) {
					$unitAmount = $units['u' . $single->unit] + $amount;
					$this->unitsModel->update($units['vref'], [
						$unitName => $unitAmount,
					]);
				} else {
					$this->unitsModel->add([
						$unitName => $amount,
					]);
				}
			}
		}
	}
}