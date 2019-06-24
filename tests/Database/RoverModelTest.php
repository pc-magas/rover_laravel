<?php

namespace Tests\Database;

use Tests\TestCase;
use App\Model\Rover;
use App\Model\Grid;

define("TEST_ROVEL_SUCCESS_VAL",3);
define("TEST_ROVEL_NEGATIVE_VAL",-1);


class RoverModelTest extends TestCase
{
    public function testSetGridPosXValueThrowsExceptionWhenNegative(){
        $this->markTestSkipped('To be implemented');
    }

    public function testSetGridPosXValueThrowsExceptionWhenOverWidth(){
        $rover = new Rover();
        $grid = new Grid();
        $grid->width=5;
        $grid->height=5;
        $rover->grid=$grid;

        $this->expectException(\InvalidArgumentException::class);
        $rover->setGridPosXValue(TEST_ROVEL_NEGATIVE_VAL);

    }

    public function testSetGridPosXValueThorwsExceptionOnNormal(){
        $rover = new Rover();
        $grid = new Grid();

        $grid->width=5;
        $grid->height=5;

        $rover->grid=$grid;
        try {
            $rover->setGridPosXValue(TEST_ROVEL_SUCCESS_VAL);
            $this->assertEquals($rover->x,TEST_ROVEL_SUCCESS_VAL);
        } catch(\Exception $e) {
            $this->fail("No exception should be thrown when setting a correct value.");
        }
    }
}
