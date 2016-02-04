<?php

namespace App\GameModule\Model\BData;

use App;

class BDataModel extends App\Model\BaseModel
{
    protected $table = 'bdata';

    public function getBuildingQueue($wid)
    {
        return $this->database->select('*')->from($this->table)
            ->where('wid = %i', $wid)
            ->orderBy('timestamp ASC')
            ->fetchAll();
    }


	public function getLastBuildTime($wid)
	{
		return $this->database->select('timestamp')->from($this->table)
			->where('wid = %i', $wid)
			->orderBy('timestamp DESC')
			->limit(1)
			->fetchSingle();
	}


	public function getLastInnerBuildTime($wid)
	{
		return $this->database->select('timestamp')->from($this->table)
			->where('wid = %i', $wid)
			->where('type > 18')
			->orderBy('timestamp DESC')
			->limit(1)
			->fetchSingle();
	}


	public function getLastOuterBuildTime($wid)
	{
		return $this->database->select('timestamp')->from($this->table)
			->where('wid = %i', $wid)
			->where('type < 19')
			->orderBy('timestamp DESC')
			->limit(1)
			->fetchSingle();
	}


    public function countBuildingQueue($wid)
    {
        return $this->database->select('count(id)')->from($this->table)
            ->where('wid = %i', $wid)
            ->fetchSingle();
    }


    public function countInnerBuildingQueue($wid)
    {
        return $this->database->select('count(id)')->from($this->table)
            ->where('wid = %i', $wid)
			->where('type > 18')
            ->fetchSingle();
    }


    public function countOuterBuildingQueue($wid)
    {
        return $this->database->select('count(id)')->from($this->table)
            ->where('wid = %i', $wid)
			->where('type < 19')
            ->fetchSingle();
    }


	/**
	 * @param int $time
	 * @return array
	 */
	public function getBuilt($time)
	{
		return $this->database->select('*')->from($this->table)
			->where('timestamp < %i', $time)
			->fetchAll();
	}
}