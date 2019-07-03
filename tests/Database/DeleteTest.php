<?php

namespace Tests\Database;
use Tests\TestCase;
use App\Model\Rover;
use App\Model\Grid;

class DeleteTest extends TestCase
{
    public function testDeletion()
    {
        $grid=factory(Grid::class)->create();
        $rover=factory(Rover::class)->create(['grid_id'=>$grid->grid_id]);
        $rover->delete();

        $roverThatGridHas=$grid->rover()->first();
        $this->assertNull($roverThatGridHas);
    }
}
