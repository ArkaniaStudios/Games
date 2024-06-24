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

namespace arkania\manager;

use nacre\form\class\SimpleForm;
use nacre\form\elements\buttons\SimpleButton;
use pocketmine\player\Player;

class FormManager {

    public function languageSelectionMenu(Player $player): void {
        $form = new SimpleForm(
            $player,
            "languages",
            "Choice your language",
            [
                new SimpleButton("french", "French"),
                new SimpleButton("english", "English"),
            ],
            function (Player $player, $data) {
            }
        );
        $player->sendForm($form);
    }

    public function friendMenu(Player $player): void {
        $form = new SimpleForm(
            $player,
            "Friend system",
            "This is a form for the friend system.",
            [
                new SimpleButton("list", "List"),
                new SimpleButton("add", "Add"),
                new SimpleButton("remove", "Remove"),
                new SimpleButton("blocked", "Blocked")
            ],
        );
        $player->sendForm($form);
    }
}