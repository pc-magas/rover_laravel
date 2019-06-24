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
        
    }

    public function setGridPosYValue($value)
    {

    }
}