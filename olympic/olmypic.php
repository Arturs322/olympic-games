<?php

echo "=======WELCOME TO THE OLYMPIC GAMES 2228========" . PHP_EOL;

function createPlayers($name, $symbol, $start): stdClass
{
    $player = new stdClass();
    $player->name = $name;
    $player->symbol = $symbol;
    $player->start = $start;

    return $player;
}

$createPlayers = [
    createPlayers('playerZ', 'Z', 0),
    createPlayers('playerX', 'X', 0),
    createPlayers('playerC', 'C', 0)
];
echo "Today's participants: " . PHP_EOL;
foreach ($createPlayers as $player)
{
    $participants = $player->symbol;
echo $participants . PHP_EOL;
}


$track=["_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"];
$end = [];
$run = function ($player) use ($track, $end, $createPlayers)
{
    $track[$player->start] = $player->symbol;
    $player->start += rand(1,2);
    echo "{$player->symbol} position in race: " . $player->start . " " . implode($track) . PHP_EOL;
};

for($i = 0; $i < 30; $i++) {
    foreach ($createPlayers as $player)
        if($player->start < 30) {
            echo  "==========<>==========" . PHP_EOL;

            $run($player);
        }  else {
            $end[] = $player->symbol;

        }
    usleep(500000);
}

echo "The winners: " . PHP_EOL;
$end= array_unique($end);

foreach ($end as $place=>$runners) {
    echo  $place. " place: $runners  ". PHP_EOL;
}
