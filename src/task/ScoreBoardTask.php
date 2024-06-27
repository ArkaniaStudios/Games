<?php

namespace arkania\task;

use nacre\scoreboard\ScoreBoard;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;

class ScoreBoardTask extends Task {
    private Player $player;

    public function __construct($player) {
        $this->player = $player;
    }

    public function onRun(): void {
        $scoreBoard = new ScoreBoard([
            "                    ",
            "1",
            "2"
        ], $this->player);
        $scoreBoard->sendScoreBoard();
    }
}