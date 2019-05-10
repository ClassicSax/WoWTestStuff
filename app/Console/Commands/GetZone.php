<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//Helpers
use App\Helpers\Dungeon;
use App\Helpers\Zones;

class GetZone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:zone {id?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves the zones from the Blizzard API';

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
        $zone = Zones::getZoneById($zone_id, $zone_name);
        $this->line(json_encode($zone));

    }
}
