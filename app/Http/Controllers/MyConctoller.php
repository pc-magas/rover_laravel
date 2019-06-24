<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Strategies\MoveRoverStrategy;

class MyController extends BaseController {

    /**
     * @param MoveRoverStrategy
     */
    private $roverStrategy = null;

    public function __construct(MoveRoverStrategy $roverStrategy){
        $this->roverStrategy = $roverStrategy;
    }

    public function myCustomIndex() {
        return "Hello";
    }

}
