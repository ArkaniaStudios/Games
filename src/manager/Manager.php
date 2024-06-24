<?php
declare(strict_types=1);

namespace arkania\manager;

use arkania\Main;

abstract class Manager {

    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
        $this->setup();
    }

    protected function getPlugin() : Main {
        return $this->plugin;
    }

    abstract protected function setup() : void;

}