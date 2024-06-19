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

namespace arkania\utils;

use arkania\customs\Register;
use arkania\listener\PlayerJoin;
use arkania\Main;

final class Loader {

    private Main $main;

    public function __construct(Main $main) {
        $this->main = $main;
        $this->initConfig();
        $this->initUnLoadCommand();
        $this->initListener();
        $this->Customs();
    }

    private function initConfig(): void {
        $this->main->saveDefaultConfig();

        mkdir($this->main->getDataFolder() . "player");
        $this->main->saveResource("player/data.json");
    }

    private function initUnLoadCommand(): void {
        $unLoadCommand = [
            'me',
            'whitelist'
        ];

        $commandMap = $this->main->getServer()->getCommandMap();

        foreach ($unLoadCommand as $unCommand)
            $commandMap->unregister($commandMap->getCommand($unCommand));
    }

    private function initListener(): void {
        $this->main->getServer()->getPluginManager()->registerEvents(new PlayerJoin(), $this->main);
    }

    private function Customs(): void {
        Register::registerAll();
        $this->main->getLogger()->info("§c*§r Items/Blocks Ready !");
    }
}