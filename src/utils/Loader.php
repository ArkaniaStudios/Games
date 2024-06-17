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
use arkania\Main;

final class Loader
{

    private Main $Main;

    public function __construct(Main $Main) {
        $this->Main = $Main;
        $this->initUnLoadCommand();
        $this->Customs();
    }

    /**
     * @return void
     */
    private function initUnLoadCommand(): void {
        $unLoadCommand = [
            'me',
            'whitelist'
        ];

        $commandMap = $this->Main->getServer()->getCommandMap();

        foreach ($unLoadCommand as $unCommand)
            $commandMap->unregister($commandMap->getCommand($unCommand));
    }

    private function Customs(): void {
        Register::registerAll();
        $this->Main->getLogger()->info("§c*§r Items/Blocks Ready !");
    }
}