<?php

namespace Tests\Database;

use Tests\TestCase;
use App\Model\Rover;
use App\Model\Grid;

define("TEST_ROVEL_SUCCESS_VAL",3);
define("TEST_ROVEL_NEGATIVE_VAL",-1);
define("TEST_ROVER_MAX_GRID_SIZE_VAL",6);
define("GRID_SIZE",5);

class RoverModelTest extends TestCase
{
    /**
     * Generate a Rover with partial mocks needed for testing
     * @return Rover
     */
    private function genRoverForTesting(): Rover {
        $rover = $this->getMockBuilder(Rover::class)
                     ->setMethods(['grid'])
                     ->getMock();
        $grid = new Grid();
        $grid->width=GRID_SIZE;
        $grid->height=GRID_SIZE;
        $rover->expects($this->any())->method('grid')->willReturn(collect([$grid]));

        return $rover;
    }

    /**
     * Test the mutator that on an invalid param will throw Exception
     *
     * @param integer $value The provided mutator value
     * @param boolean $yval Wherther the value is the y position of the rover or not.
     * @return void
     */
    private function setGridPosValueThrowsExceptionInvalidValueTest(int $value, bool $yval=false): void{
        $rover = $this->genRoverForTesting();
        $this->expectException(\InvalidArgumentException::class);
        if(!$yval){
            $rover->setGridPosXValue($value);
        }
        $rover->setGridPosYValue($value);
    }

    private function setGridPosValueValidValueTest(int $value, bool $yval=false): void {

        $rover = $this->genRoverForTesting();
        try {
            if(!$yval){
                $rover->setGridPosXValue($value);
            } else {
                $rover->setGridPosYValue($value);
            }
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->fail("No exception should be thrown when setting a correct value. Exception type: "+get_class($e)+"\n Exception Message: "+$e->getMessage());
        }
    }

    // Testing the setter for the `grid_pos_x` column
    public function testSetGridPosXValueThrowsExceptionWhenNegative(): void {
        $this->setGridPosValueThrowsExceptionInvalidValueTest(TEST_ROVER_MAX_GRID_SIZE_VAL);
    }

    public function testSetGridPosXValueThrowsExceptionWhenOverWidth(): void {
        $this->setGridPosValueThrowsExceptionInvalidValueTest(TEST_ROVEL_NEGATIVE_VAL);
    }

    public function testSetGridPosXValueThorwsExceptionOnNormal(): void {
        $this->setGridPosValueValidValueTest(TEST_ROVEL_SUCCESS_VAL);
    }


    // Testing the setter for the `grid_pos_y` column
    public function testSetGridPosYValueThrowsExceptionWhenNegative(): void {
        $this->setGridPosValueThrowsExceptionInvalidValueTest(TEST_ROVER_MAX_GRID_SIZE_VAL,true);
    }

    public function testSetGridPosYValueThrowsExceptionWhenOverWidth(): void {
        $this->setGridPosValueThrowsExceptionInvalidValueTest(TEST_ROVEL_NEGATIVE_VAL,true);
    }

    public function testSetGridPosYValueThorwsExceptionOnNormal(): void {
        $this->setGridPosValueValidValueTest(TEST_ROVEL_SUCCESS_VAL,true);
    }

    // Other tests
}
