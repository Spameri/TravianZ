<?php

namespace App\GameModule\Model\Building;

use App;

class BuildingModel extends App\Model\BaseModel
{
    protected $table = 'building';
    protected $tableLevel = 'building_levels';
    protected $tableRequirement = 'building_requirement';

    const WOODCUTTER = 1;
    const CLAY_PIT = 2;
    const IRON_MINE = 3;
    const CROPLAND = 4;
    const SAWMILL = 5;
    const BRICK = 6;
    const FOUNDRY = 7;
    const GRAIN_MILL = 8;
    const BAKERY = 9;
    const WAREHOUSE = 10;
    const GRANARY = 11;
    const MAIN_BUILDING = 15;
	const RALLY_POINT = 16;
	const BARRACKS = 19;
    const CRANNY = 23;
	const CITY_WALL = 31;
	const EARTH_WALL = 32;
	const PALISADE = 33;
	const TRAPPER = 36;
	const WORLD_WONDER = 40;

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


	/**
	 * @param int $id
	 * @return array
	 */
	public function getRequirements($id)
	{
		return $this->database->select('*')->from($this->tableRequirement)
			->where('building = %i', $id)
			->fetchAll();
	}
}