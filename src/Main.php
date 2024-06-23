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

use arkania\database\DataBaseManager;
use arkania\interface\FormManager;
use arkania\task\BossBar;
use arkania\utils\Loader;
use Exception;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {
    use SingletonTrait;

    private FormManager $formManager;
    private DataBaseManager $dataBaseManager;

    /**
     * @throws Exception
     */
    protected function onLoad(): void {
        self::setInstance($this);

        $this->dataBaseManager = new DataBaseManager($this);
    }

    protected function onEnable(): void {
        $this->formManager = new FormManager();

        new Loader($this);

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

    public function formManager(): FormManager {
        return $this->formManager;
    }

    public function databaseManager(): DataBaseManager {
        return $this->dataBaseManager;
    }

}