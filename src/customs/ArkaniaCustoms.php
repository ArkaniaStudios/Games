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

namespace arkania\customs;

use arkania\customs\blocks\TestBlock;
use arkania\customs\items\FriendItem;
use arkania\customs\items\NavigatorItem;
use arkania\customs\items\TestItem;
use customiesdevs\customies\block\CustomiesBlockFactory;
use customiesdevs\customies\item\CustomiesItemFactory;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\utils\CloningRegistryTrait;

/**
 * @method static TestItem TEST_ITEM()
 * @method static FriendItem FRIEND_ITEM()
 * @method static NavigatorItem NAVIGATOR_ITEM()
 *
 * @method static TestBlock TEST_BLOCK()
 */

final class ArkaniaCustoms {
    use CloningRegistryTrait;

    private const string PREFIX = "arkania:";

    protected static function setup(): void {
        self::setupItems();
        self::setupBlocks();
    }

    private static function setupItems(): void {

        self::_registryRegister("test_item", self::getItem("test_item"));
        self::_registryRegister("friend_item", self::getItem("friend_item"));
        self::_registryRegister("navigator_item", self::getItem("navigator_item"));

    }

    private static function setupBlocks(): void {

        self::_registryRegister("test_block", self::getBlock("test_block"));

    }

    private static function getItem($identifier): Item {
        return CustomiesItemFactory::getInstance()->get(self::PREFIX . $identifier);
    }

    private static function getBlock($identifier): Block {
        return CustomiesBlockFactory::getInstance()->get(self::PREFIX . $identifier);
    }
}