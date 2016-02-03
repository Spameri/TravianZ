<?php

namespace App\GameModule\Model;

class DisplayValues
{
	/**
	 * Converts to human readable number.
	 * @param  int
	 * @return string
	 */
	public static function number($number)
	{
		$number = round($number);
		$units = ['K', 'M', 'B', 'T', 'q', 'Q', 's', 'S', 'O', 'N', 'D', 'UD', 'BD', 'TD', 'qD', 'QD'];
		$text = '';
		foreach ($units as $unit) {
			if (abs($number) < 1000 || $unit === end($units)) {
				break;
			}
			$number = $number / 1000;
			$text = $unit;
		}

		return round($number, 3) . ' ' . $text;
	}
}