<?php

declare(strict_types=1);

namespace arkania\listener;

use arkania\customs\ArkaniaCustoms;
use arkania\Main;
use arkania\task\BossBarTask;
use arkania\utils\Utils;
use nacre\bossbar\BossBar;
use nacre\bossbar\BossBarColor;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\TaskScheduler;

class PlayerJoin implements Listener {

    private TaskScheduler $scheduler;
    private Main $Main;

    public function __construct(TaskScheduler $scheduler) {
        $this->scheduler = $scheduler;
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();

        $player->getInventory()->clearAll();
        $player->getInventory()->setItem(4, ArkaniaCustoms::NAVIGATOR_ITEM());

        if (!$player->hasPlayedBefore()) {
            $player->sendToastNotification("JOIN", "Welcome to Arkania !");
            Main::getInstance()->formManager()->languageSelectionMenu($player);
        }else{
            $player->sendTitle("§fWelcome !", "§cEnjoy your stay !");
        }

        $event->setJoinMessage('');
        $player->sendPopup('[§a+§f] ' . $player->getName());

        $bossBars = [
            (new BossBar())->setTitle("   §d     Support us !")->setPercentage(1)->setSubTitle("§f(§earkaniastudios.com/store§f)")->setColor(BossBarColor::PINK),
            (new BossBar())->setTitle("   §aDon't forget to vote !")->setPercentage(1)->setSubTitle("§f(§earkaniastudios.com/vote§f)")->setColor(BossBarColor::GREEN),
            (new BossBar())->setTitle("     §b  Join our Discord !")->setPercentage(1)->setSubTitle("§f(§earkaniastudios.com/discord§f)")->setColor(BossBarColor::REBECCA_PURPLE),
        ];

        $this->scheduler->scheduleRepeatingTask(new BossBarTask($player, $bossBars, 0.005), 1);
    }

}