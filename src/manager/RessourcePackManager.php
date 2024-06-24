<?php
declare(strict_types=1);

namespace arkania\manager;

use arkania\Main;
use arkania\utils\exception\InvalidResourcesPackException;
use pocketmine\resourcepacks\ZippedResourcePack;
use pocketmine\Server;
use Symfony\Component\Filesystem\Path;
use ZipArchive;

class RessourcePackManager extends Manager {
    protected static bool $isDev;
    private static bool $isEnable = false;

    protected function setup() : void {
        $packName = 'ArkaniaGamesPack';
        if (!preg_match('/^[A-Za-z0-9_\-]/', $packName)) {
            throw new InvalidResourcesPackException("Invalid pack name");
        }

        @mkdir($this->getPlugin()->getDataFolder() . 'pack');

        if ($this->packExist($packName)){
            unlink($this->getPackPath($packName));
        }

        if (self::$isEnable){
            $this->loadPack($packName);
        }
    }

    public static function disableResourcePack() : void {
        self::$isEnable = false;
    }

    private function getPackPath(string $packName) : string {
        return Main::getInstance()->getDataFolder() . 'pack/' . $packName . '.zip';
    }

    public static function enableResourcePack(bool $dev = false) : void {
        self::$isEnable = true;
        self::$isDev = $dev;
    }

    private function packExist(string $packName) : bool {
        return \file_exists($this->getPackPath($packName));
    }

    private function loadPack(string $packName) : void {
        $path = Path::join(Server::getInstance()->getPluginPath(), Main::getInstance()->getName(), 'resources');
        $this->savePackInData(Path::join($path, 'pack', $packName));
        $this->zipPack(Path::join($path, 'pack', $packName), Path::join(Main::getInstance()->getDataFolder(), 'pack'), $packName);
        $this->registerPack($packName);
    }

    private function registerPack(string $packName) : void {
        $resourcesPack = Server::getInstance()->getResourcePackManager();
        $resourcesPack->setResourceStack(array_merge($resourcesPack->getResourceStack(), [
            new ZippedResourcePack(Main::getInstance()->getDataFolder() . 'pack/' . $packName . '.zip')
        ]));
    }

    private function zipPack(string $path, string $zipPath, string $type) : void {
        $archive = new ZipArchive();
        $archive->open(Path::join($zipPath, $type . ".zip"), ZipArchive::CREATE);
        $this->addToArchive($path, $type, $archive);
        $archive->close();
    }

    private function addToArchive(string $path, string $type, ZipArchive $archive, string $dataPath = "") : void {
        foreach (array_diff(\scandir($dirPath = Path::join($path, $dataPath)), ['.', '..']) as $file) {
            if (is_file($filePath = Path::join($dirPath, $file))) {
                $archive->addFile($filePath, $dataPath !== "" ? Path::join($dataPath, $file) : $file);
            } else {
                $this->addToArchive($path, $type, $archive, Path::join($dataPath, $file));
            }
        }
    }

    private function savePackInData(string $path, string $addPath = '') : void {
        $dir = opendir($path . '\\' . $addPath);
        if ($dir === false) {
            return;
        }
        while($file = readdir($dir)){
            if (is_file($path . '\\' . $addPath . '\\' . $file)){
                Main::getInstance()->saveResource($addPath . '\\' . $file, true);
            } else {
                if ($file != '.' && $file != '..'){
                    $this->savePackInData($path, $addPath . '\\' . $file);
                }
            }
        }
    }
}