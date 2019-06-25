<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\RoverConstants;

class GridWithRoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grid')->insert([
            'id' => 2,
            'width' => 10,
            'height' => 10,
        ]);

        $roverCommand=implode("",[ RoverConstants::COMMAND_ROT_LEFT,
            RoverConstants::COMMAND_MOVE,
            RoverConstants::COMMAND_ROT_LEFT,
            RoverConstants::COMMAND_ROT_LEFT,
            RoverConstants::COMMAND_MOVE,
            RoverConstants::COMMAND_ROT_RIGHT,
        ]);

        DB::table('rover')->insert([
            'id' => 1,
            'grid_id' => 2,
            'command' => "RRMRMMRM",
            'grid_pos_x' => 3,
            'grid_pos_y' => 4,
            'rotation' => RoverConstants::ORIENTATION_SOUTH,
            'last_command' => ""
        ]);
    }
}
