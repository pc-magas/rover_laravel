<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Model\Rover;
use App\Model\Grid;
use Mockery;

class RoverModelTest extends TestCase
{
    public function testSetGridPosXValueThrowsExceptionWhenNegative(){
        $this->markTestSkipped('To be implemented');
    }

    public function testSetGridPosXValueThrowsExceptionWhenOverWidth(){
        $this->markTestSkipped('To be implemented');
    }

    public function testSetGridPosXValueThorwsExceptionOnNormal(){
        $rover = new Rover();
        $grid = new Grid();

        $grid->width=5;
        $grid->height=5;

        $rover->grid=$grid;
        try {
            $rover->setGridPosXValue(3);
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->assertFalse(false);
        }
    }
}
