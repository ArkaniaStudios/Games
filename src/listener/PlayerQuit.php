<?php

declare(strict_types=1);

namespace arkania\listener;

use arkania\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerQuit implements Listener {

    private Main $Main;
    public function onPlayerQuit(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();

        $event->setQuitMessage('');
        $player->sendPopup('[§c-§f] ' . $player->getName());

    }

}
