<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


class MyController extends BaseController{

    public function myCustomIndex() {
        return "Hello";
    }

}