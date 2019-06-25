<?php

namespace  Tests\Database\Integration\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use NilPortugues\Foundation\Domain\Model\Repository\Page;
use App\Repositories\RoverRepository;


class RoverRepositoryTest extends TestCase
{
    // use RefreshDatabase;
    use DatabaseMigrations;
    use RefreshDatabase;

   /**
     * Testing Base Search
     *
     * @return void
    */
    public function testBasicSearch(): void
    {
        $repository = new RoverRepository();
        /**
         * @var Page
         */
        $data = $repository->findAll();

        var_dump($data->elements);
        $this->assertTrue(true);
    }
}
