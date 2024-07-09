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
            " §cUser: §r" . $this->player->getName(),
            " §cRank: ",
            " §cLevel(s): §e0",
            "",
            " §7" . date("d/m/y"),
            " §6arkaniastudios.com"
        ], $this->player);
        $scoreBoard->sendScoreBoard();
    }
}