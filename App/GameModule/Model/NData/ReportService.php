<?php

namespace App\GameModule\Model\NData;

use App;

class ReportService
{
	/**
	 * @param int $vid
	 * @param int $user
	 * @param int $limit
	 * @return array
	 */
	public function getLastReportsForUser($vid, $user, $limit = 5)
	{
		$reports = [];

		// TODO GET AVAILABLE REPORTS

		return $reports;
	}
}