<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Grid;

class Rover extends Model
{

    /**
     * Table Name
     */
    protected $table='rover';

    public function grid()
    {
        return $this->belongsTo(Grid::class);
    }

    public function setGridPosXValue($value)
    {
        $Grid = $this->grid()->first();
        $width = $Grid->width;
        if($value < 0 || $value > $width){
            throw new \InvalidArgumentException("X is out of grid bounds");
        }

        $this->attributes['grid_pos_x']=$value;
    }

    public function setGridPosYValue($value)
    {
        $Grid = $this->grid()->first();
        $height = $Grid->height;

        if($value < 0 || $value > $height){
            throw new \InvalidArgumentException("Y is out of grid bounds");
        }

        $this->attributes['grid_pos_y']=$value;
    }
}
