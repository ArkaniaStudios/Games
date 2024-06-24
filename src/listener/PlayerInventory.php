<?php

declare(strict_types=1);

namespace arkania\listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;

class PlayerInventory implements Listener {

    public function PlayerDropEvent(PlayerDropItemEvent $event): void {
        $event->cancel();
    }

}