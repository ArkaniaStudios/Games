<?php

declare(strict_types=1);

/**
 *     _      ____    _  __     _      _   _   ___      _
 *    / \    |  _ \  | |/ /    / \    | \ | | |_ _|    / \
 *   / _ \   | |_) | | ' /    / _ \   |  \| |  | |    / _ \
 *  / ___ \  |  _ <  | . \   / ___ \  | |\  |  | |   / ___ \
 * /_/   \_\ |_| \_\ |_|\_\ /_/   \_\ |_| \_| |___| /_/   \_\
 *
 * @author: ArkaniaStudios
 * @link: https://github.com/ArkaniaStudios
 *
 */

namespace arkania\listener;

use arkania\Main;
use JsonException;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class PlayerJoin implements Listener {
    public Config $cfg;

    public function __construct() {
        $this->cfg = new Config(Main::getInstance()->getDataFolder() . "player/data.json");
    }

    /**
     * @throws JsonException
     */
    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();

        if (!$player->hasPlayedBefore()) {
            $this->cfg->setNested($player->getName(), "language");
            $this->cfg->save();
            Main::getInstance()->formManager()->languageSelectionMenu($player);
        }
    }
}