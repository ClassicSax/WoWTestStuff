<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//Helpers
use App\Helpers\Dungeon;

class GetDungeon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:dungeon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A Command to pull dungeons from JSON';

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
        $token = Dungeon::generateToken();

        $bosses = Dungeon::getBosses();
        $boss = Dungeon::getBoss($bosses);
        $this->line(json_encode($boss));
    }
}
