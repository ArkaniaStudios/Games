<?php

declare(strict_types=1);

namespace arkania\task;

use pocketmine\scheduler\Task;
use pocketmine\player\Player;

class BossBarTask extends Task {

    private Player $player;
    private array $bossBars;
    private int $current;
    private float $decrementAmount;

    public function __construct(Player $player, array $bossBars, float $decrementAmount = 0.05) {
        $this->player = $player;
        $this->bossBars = $bossBars;
        $this->current = 0;
        $this->decrementAmount = $decrementAmount;


        $this->bossBars[$this->current]->addPlayer($this->player);
    }

    public function onRun(): void {
        $currentBossBar = $this->bossBars[$this->current];
        $currentPercentage = $currentBossBar->getPercentage();

        if ($currentPercentage > 0) {
            $currentBossBar->setPercentage($currentPercentage - $this->decrementAmount);
        } else {
            $currentBossBar->removePlayer($this->player);
            $this->current = ($this->current + 1) % count($this->bossBars);
            $newBossBar = $this->bossBars[$this->current];
            $newBossBar->setPercentage(1);
            $newBossBar->addPlayer($this->player);
        }
    }
}