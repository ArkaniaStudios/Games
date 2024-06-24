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
use arkania\listener\PlayerInventory;
use arkania\listener\PlayerQuit;
use arkania\Main;
use arkania\manager\RessourcePackManager;

final class Loader {

    private Main $main;

    public function __construct(Main $main) {
        $this->main = $main;
        $this->initUnLoadCommand();
        $this->initListener();
        $this->Customs();
        $this->initManager();
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
        $events = [

            new PlayerJoin($this->main->getScheduler()),
            new PlayerQuit(),
            new PlayerInventory()
        ];

        $eventManager = $this->main->getServer()->getPluginManager();

        foreach ($events as $event)
            $eventManager->registerEvents($event, $this->main);

        /* Alerts */
        $this->main->getLogger()->info("§c*§r Listener Ready !");
    }

    private function Customs(): void {
        Register::registerAll();

        /* Alerts */
        $this->main->getLogger()->info("§c*§r Items/Blocks Ready !");
    }

    private function initManager(): void {
        new RessourcePackManager($this->main);

        /* Alerts */
        $this->main->getLogger()->info("§c*§r Manager Ready !");
    }

}