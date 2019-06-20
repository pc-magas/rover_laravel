<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rover', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('grid_id')->unsigned();
            $table->string('command');
            $table->foreign('grid_id')->references('id')->on('grid');
            $table->smallInteger('last_commandPos')->unsigned()->default(0);
            $table->smallInteger('grid_pos_x')->unsigned();
            $table->smallInteger('grid_pos_y')->unsigned();
            $table->enum('rotation', App\Constants\RoverConstants::ORIENTATIONS);
            $table->string('last_command');

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rover');
    }
}
