<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Rover;

class Grid extends Model
{
    /**
     * Table Name
     */
    protected $table='grid';

    public $timestamps = false;

    public function rovers()
    {
        return $this->hasMany(Rover::class);
    }
}
