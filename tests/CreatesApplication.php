<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use DotEnv\DotEnv;
use DotEnv\Loader;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        // if (file_exists(dirname(__DIR__) . '/../.env.test')) {
        //     $dotenv=Dotenv\Dotenv::create(__DIR__,'/../.env.test');
        //     $dotenv->load();
        // }

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
