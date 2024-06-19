<?php

namespace arkania\listener;

use arkania\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class PlayerJoin implements Listener {

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();

        if (!$player->hasPlayedBefore()) {
            Main::getInstance()->formManager()->languageSelectionMenu($player);
        }
    }
}