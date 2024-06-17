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

namespace arkania\customs\items;

use customiesdevs\customies\item\CustomiesItemFactory;
use pocketmine\utils\SingletonTrait;

class ItemUtils {
    use SingletonTrait;

    public function register(
        string $class,
        string $identifier,
        string $name
    ): void {
        CustomiesItemFactory::getInstance()->registerItem(
            $class,
            "arkania:" . $identifier,
            $name
        );
    }
}