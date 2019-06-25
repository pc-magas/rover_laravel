<?php

namespace  Test\Database\Integration\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\RoverRepository;
use App\Model\Rover;
use App\Model\Grid;

class RoverRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Undocumented variable
     *
     * @var RoverRepository|null
     */
    private $repository=null;

    /**
     * Undocumented variable
     *
     * @var Grid|null;
     */
    private $grid=null;

    public function setUp(): void
    {
        parent::setUp();

        $this->runDatabaseMigrations();

        $grid=factory(Grid::class)->create([
            'width'=>5,
            'height'=>5
        ]);

        $rover=factory(Rover::class, 5)->create([
            'grid_id' => $grid->id,
            'grid_pos_x' => rand(0, $grid->width),
            'grid_pos_y' => rand(0, $grid->height),
        ]);

        $this->grid=$grid;
        //How do I run Migrations and generate the db?

        $this->repository = new RoverRepository();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        //How do I nuke my Database?
    }

   /**
     * Testing Base Search
     *
     * @return void
    */
    public function testBasicSearch(): void
    {
        $this->assertTrue(true);
    }
}
