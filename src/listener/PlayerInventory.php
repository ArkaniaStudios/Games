<?php

declare(strict_types=1);

namespace arkania\listener;

use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\Listener;

class PlayerInventory implements Listener {

    public function PlayerDropEvent(InventoryTransactionEvent $event): void {
        $event->cancel();
    }
}