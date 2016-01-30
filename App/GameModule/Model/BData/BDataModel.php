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
            ->orderBy('timestamp DESC')
            ->fetchAll();
    }
}