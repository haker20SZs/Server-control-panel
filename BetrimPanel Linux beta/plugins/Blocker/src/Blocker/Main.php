<?php

namespace Blocker;

use pocketmine\event\Listener;
use pocketmine\{Player,Server};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{CommandSender, Command};
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->url = "http://{website}/players/api/bans"; //Ссылка на бан систему
		$this->key = "root"; //Ключ с файла config.php
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $argument){

		switch($command->getName()){
			case "blocker":

		    if(!$sender->hasPermission("cmd.blocker") && !$sender->isOp()) return $sender->sendMessage("§l§7[:§eＭ§7:] - §fУ вас нету прав на использование команды§7: §e/blocker §7(§fban§7/§fpardon§7),\n§l§7[:§eＭ§7:] - §fДоступ к этой команде есть только у §7(§eЛегенды и до Начальника§7),");

			switch(array_shift($argument)){

			case "ban":

			   if(!isset($argument[0], $argument[1])){
			   	   $sender->sendMessage("§l§7[:§eＭ§7:] - §fИспользуйте§7: §e/ban §7(§fНик§7) §7(§fПричина§7),");
			   }else{
			   	   if($sender->getServer()->getPlayer($argument[0])){
			   	   	  $sender->getServer()->getNameBans()->addBan($sender->getName(), $argument[1], null, $argument[0]);
					  foreach($this->getServer()->getOnlinePlayers() as $player){
			   	   	   	  $player->kick("§cВаш аккаунт заблокирован", false);
			   	   	  }
			   	   	  json_decode(Utils::getURL($this->url . "?nick=" . $argument[0] . "&add=true&key=" . $this->key . "&hash=true"), true); //Запрос на сайт
			   	   }else{
			   	   	  $sender->sendMessage("§l§7[:§eＭ§7:] - §fИгрок не онлайн или вы ввели не верный ник.");
			   	   }

			   }

			break;

			case "pardon":

			    if(!isset($argument[0])){
			    	$sender->sendMessage("§l§7[:§eＭ§7:] - §fИспользуйте§7: §e/pardon §7(§fНик§7),");
			    }else{
			    	$sender->getServer()->getNameBans()->remove($argument[0]);
			    	json_decode(Utils::getURL($this->url . "?nick=" . $argument[0] . "&remove=true&key=" . $this->key . "&hash=true"), true); //Запрос на сайт
			    }

			break;

	        default:

	            $sender->sendMessage("§l§7[:§eＭ§7:] - §fИспользуйте§7: §e/bloker §7(§fban§7/§fpardon§7),");

	        break;
		}
		break;
	}
  }
}

?>
