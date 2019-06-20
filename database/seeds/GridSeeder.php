<?php

use Illuminate\Support\Str;
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
            'id' => 1,
            'width' => 10,
            'height' => 10,
        ]);

        DB::table('rover')->insert([
            'id' => 1,
            'rover_id' => 1,
            'command' => "RRMRMMRM",
            'last_command'=>""
        ]);
    }
}