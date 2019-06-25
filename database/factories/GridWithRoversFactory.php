<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Grid;
use App\Model\Rover;
use App\Constants\RoverConstants;
use Faker\Generator as Faker;

/**
 * Random Command Generator based upon:
 * https://stackoverflow.com/a/13212994/4706711
 * @param integer $length How many characters the wommand will contain.
 * @return string
 */
function generateRandomCommand($length = 10): string {
    return substr(str_shuffle(str_repeat($x=implode('',RoverConstants::AVAILABLE_COMMANDS), ceil($length/strlen($x)) )),1,$length);
}

$factory->define(Grid::class,function(Faker $faker){
    return [
        'width'=>rand(1,10),
        'height'=>rand(1,10)
    ];
});

$factory->define(Rover::class, function(Faker $faker) {
    $command = generateRandomCommand(rand(0));
    $commandLength = strlen($command);
    $commandPos = rand(0,$commandLength);
    $lastExecutedCommand = substr($command,$commandPos,$commandPos);

    $randomGrid=Grid::inRandomOrder();

    if(empty($randomGrid)){
        $randomGrid = factory(Grid::class)->create();
    }

    return [
        'grid_id' => $randomGrid->value('id'),
        'grid_pos_x' => rand(0,$randomGrid->value('width')),
        'grid_pos_y' => rand(0,$randomGrid->value('height')),
        'rotation' => RoverConstants::ORIENTATION_EAST,
        'command' => $command,
        'last_commandPos' => $commandPos,
        'last_command' => $lastExecutedCommand,
    ];
});
