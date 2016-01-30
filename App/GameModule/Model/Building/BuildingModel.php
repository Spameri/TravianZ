<?php

namespace App\GameModule\Model\Building;

use App;

class BuildingModel extends App\Model\BaseModel
{
    protected $table = 'building';
    protected $tableLevel = 'building_levels';

    const WOODCUTTER = 1;
    const CLAY_PIT = 2;
    const IRON_MINE = 3;
    const CROPLAND = 4;
    const SAWMILL = 5;
    const BRICK = 6;
    const FOUNDRY = 7;
    const GRAIN_MILL = 8;
    const BAKERY = 9;

    /**
     * @param int $building
     * @param int $level
     * @return \Dibi\Row|FALSE
     */
    public function getBuildingLevel($building, $level)
    {
        return $this->database->select('*')->from($this->tableLevel)
            ->where('building = %i', $building)
            ->where('level = %i', $level)
            ->fetch();
    }


    public function getAll()
    {
        return $this->database->select('*')->from($this->table)
            ->fetchPairs('id', 'name');
    }
}