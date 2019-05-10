<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//Helpers
use App\Helpers\Dungeon;
use App\Helpers\Zones;

//Model
use App\Boss;


class UpdateBosses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:bosses {id?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs through the blizzard api and updates bosses or creates new ones in the database';

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
        $boss_id = $this->argument('id');
        $boss_name = $this->argument('name');
        $bosses = Dungeon::getBosses();
        foreach ($bosses as $boss) {
            Boss::updateOrCreate([
                'id' => $boss->id,
                'name' => $boss->name,
                'location' => $boss->zoneId,
                'description' => isset($boss->description) ? $boss->description : null
            ]);
        }

    }
}
