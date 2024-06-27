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
use arkania\customs\items\CosmeticItem;
use arkania\customs\items\FriendItem;
use arkania\customs\items\ItemUtils;
use arkania\customs\items\NavigatorItem;
use arkania\customs\items\PartyItem;
use arkania\customs\items\SettingItem;
use arkania\customs\items\TestItem;
use customiesdevs\customies\block\Model;
use customiesdevs\customies\item\CreativeInventoryInfo;

final class Register {

    public static function registerAll(): void {
        self::item();
        self::block();
    }

    private static function item(): void {
        $i = ItemUtils::getInstance();

        $i->register(TestItem::class, "test_item", "item pour test");
        $i->register(FriendItem::class, "friend_item", "Friends");
        $i->register(NavigatorItem::class, "navigator_item", "Navigator");
        $i->register(PartyItem::class, "party_item", "Party");
        $i->register(SettingItem::class, "setting_item", "Settings");
        $i->register(CosmeticItem::class, "cosmetic_item", "Cosmetics");
    }

    private static function block(): void {
        $b = BlockUtils::getInstance();

        $b->register(TestBlock::class, "test_block", "test_block", Model::SOLID, "geometry.block", CreativeInventoryInfo::CATEGORY_CONSTRUCTION);

    }
}