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
            " ",
            "  ",
            "   ", // blank at here
            "§cUser: §r" . $this->player->getName(),
            "",
            "§7" . date("d/m/y"),
            "§6arkaniastudios.com"
        ], $this->player);
        $scoreBoard->sendScoreBoard();
    }
}