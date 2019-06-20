<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Strategies\MoveRoverStrategy;

class ExecuteRoverCommandSequence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rover:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execures the command sequence of a specific Rover.';

    /**
     * @var MoveRoverStrategy
     */
    private $roverStrategy=null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MoveRoverStrategy $roverStrategy)
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
        //
    }
}
