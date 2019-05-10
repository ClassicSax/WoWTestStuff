<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//Helpers
use App\Helpers\Dungeon;
use App\Helpers\Zones;

//Model
use App\Zone;


class UpdateZones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:zones {id?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs through the blizzard api and updates zones or creates new ones in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $zone_id = $this->argument('id');
        $zone_name = $this->argument('name');
        $zones = Zones::getZoneById($zone_id, $zone_name);
        // $this->line(json_encode($zones));
        foreach ($zones as $zone) {

            $arr = Zone::updateOrCreate([
                'id' => $zone['id'],
                'name' => $zone['name'],
                'description' => isset($zone['description']) ? $zone['description'] : null
            ]);
        }

    }
}
