<?php

namespace App\GameModule\Controls\Train;


interface ITrainControl
{
	/**
	 * @param array $units
	 * @return TrainControl
	 */
	public function create($units = []);
}