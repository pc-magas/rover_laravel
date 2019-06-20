<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('rover')->insert([
            'id' => 1,
            'grid_id' => 2,
            'command' => "RRMRMMRM",
            'last_command'=>""
        ]);
    }
}