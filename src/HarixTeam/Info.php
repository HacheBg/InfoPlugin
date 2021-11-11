<?php

namespace HarixTeam;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;

class Info extends PluginBase{

    public function onLoad(): void{
        $this->getLogger()->info(C::GREEN . "Loading InfoPlugin");
    }

    public function onEnable(): void{

        $this->getLogger()->info(C::YELLOW . "Enabled InfoPlugin");
        $this->saveResource("config.yml");
    }

    public function onDisable(): void{
        $this->getLogger()->info(C::RED . "Disabled InfoPlugin");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        //$sender is a player
        switch($command){
            case "discord":
                $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
                $sender->sendMessage($config->get("discord"));
                break;
            case "site":
                $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
                $sender->sendMessage($config->get("site"));
                break;
        }
        return true;
    }
}
