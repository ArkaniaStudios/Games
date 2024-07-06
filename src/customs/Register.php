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

use arkania\customs\blocks\BlockUtils;
use arkania\customs\blocks\TestBlock;
use customiesdevs\customies\block\Model;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\CustomiesItemFactory;

final class Register {

    public static function registerAll(): void {
        self::item();
        self::block();
    }

    private static function item(): void {
        CustomiesItemFactory::getInstance()->registerAllItems('arkania\\customs\\items', __DIR__ . '/items', true);
    }

    private static function block(): void {
        $b = BlockUtils::getInstance();

        $b->register(TestBlock::class, "test_block", "test_block", Model::SOLID, "geometry.block", CreativeInventoryInfo::CATEGORY_CONSTRUCTION);

    }
}