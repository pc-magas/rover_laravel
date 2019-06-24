<?php

namespace Tests\Database;

use Tests\TestCase;
use App\Model\Rover;
use App\Model\Grid;

define("TEST_ROVEL_SUCCESS_VAL",3);
define("TEST_ROVEL_NEGATIVE_VAL",-1);
define("GRID_SIZE",5);

class RoverModelTest extends TestCase
{
    private function genRoverForTesting(){
        $rover = $this->getMockBuilder(Rover::class)
                     ->setMethods(['grid'])
                     ->getMock();
        $grid = new Grid();
        $grid->width=GRID_SIZE;
        $grid->height=GRID_SIZE;
        $rover->expects($this->any())->method('grid')->willReturn(collect([$grid]));

        return $rover;
    }

    public function testSetGridPosXValueThrowsExceptionWhenNegative(){
        $this->markTestSkipped('To be implemented');
    }

    public function testSetGridPosXValueThrowsExceptionWhenOverWidth(){
        $rover = $this->genRoverForTesting();
        $this->expectException(\InvalidArgumentException::class);
        $rover->setGridPosXValue(TEST_ROVEL_NEGATIVE_VAL);

    }

    public function testSetGridPosXValueThorwsExceptionOnNormal(){
        $rover = $this->genRoverForTesting();
        try {
            $rover->setGridPosXValue(TEST_ROVEL_SUCCESS_VAL);
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->fail("No exception should be thrown when setting a correct value. Exception type: "+get_class($e)+"\n Exception Message: "+$e->getMessage());
        }
    }
}
