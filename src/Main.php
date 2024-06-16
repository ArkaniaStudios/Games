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

namespace arkania;

use arkania\utils\Utils;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {
    use SingletonTrait;

    protected function onLoad(): void {
        self::setInstance($this);
        $this->getLogger()->info(Utils::getPrefix() . "§aLaunching...");
    }

    protected function onEnable(): void {

        $this->getLogger()->info(
            "\n     _      ____    _  __     _      _   _   ___      _".
            "\n    / \    |  _ \  | |/ /    / \    | \ | | |_ _|    / \ ".
            "\n   / _ \   | |_) | | ' /    / _ \   |  \| |  | |    / _ \ ".
            "\n  / ___ \  |  _ <  | . \   / ___ \  | |\  |  | |   / ___ \ ".
            "\n /_/   \_\ |_| \_\ |_|\_\ /_/   \_\ |_| \_| |___| /_/   \_\ ".
            "\n ".
            "\n* Games plugins launch !"
        );
    }
}