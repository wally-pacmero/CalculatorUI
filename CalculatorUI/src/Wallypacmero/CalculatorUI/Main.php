<?php

namespace Wallypacmero\CalculatorUI;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\utils\Config;

use Wallypacmero\CalculatorUI\libs\jojoe77777\FormAPI\SimpleForm;
use Wallypacmero\CalculatorUI\libs\jojoe77777\FormAPI\CustomForm;

class Main extends PluginBase implements Listener{

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){                    
            case "cal":
                if($sender instanceof Player){
                    if($sender->hasPermission("calculatorui.command")){
                        $this->CalculatorUI($sender);
                    }else{
                        $sender->sendMessage("§cYou Don't Have Permissions");
                    }
                }else{
                        $sender->sendMessage("§cUse Command Ingame!");
                }
	    break;
        }
	return true;
    } 

    public function CalculatorUI($sender){ 
            $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
                break;
                case 1:
                    $this->Add($sender);
                break;
                case 2:
                    $this->Sub($sender);
                break;
                case 3:
                    $this->Multiply($sender);
                break;
                case 4:
                    $this->Divide($sender);
                break;

                }
            });
            $form->setTitle("§e§lCalculatorUI");
            $form->setContent("§bTo Help Multiply In Math");
            $form->addButton("§cExit\n§fTap To Close");
            $form->addButton("§bAdd §f(§a+§f)\n§fTap To Open");
            $form->addButton("§bSub §f(§a-§f)\n§fTap To Open");
            $form->addButton("§bMultiply §f(§a*§f)\n§fTap To Open");
            $form->addButton("§bDivide §f(§a/§f)\n§fTap To Open");
            $form->sendToPlayer($sender);
            return $form;
    }

    public function Add($sender){ 
	    $form = new CustomForm(function (Player $sender, $data) {
                    if($data !== null){
                       $numbers1 = (int)$data[1];
                       $numbers2 = (int)$data[2];
                       $result = $numbers1 + $numbers2;
                       $sender->sendMessage("§aResult§f: §b".$result);
				    }
				});
				$form->setTitle("§b§lAdd §f(§a+§f)");
				$form->addLabel("§ePlease Write The First Number Here:");
				$form->addInput("§bEnter The First Number Here:", "§f1");
				$form->addInput("§bEnter The Second Number Here:", "§f1");
				$form->sendToPlayer($sender);
    }

    public function Sub($sender){ 
	    $form = new CustomForm(function (Player $sender, $data) {
                    if($data !== null){
                       $numbers1 = (int)$data[1];
                       $numbers2 = (int)$data[2];
                       $result = $numbers1 - $numbers2;
                       $sender->sendMessage("§aResult§f: §b".$result);
				    }
				});
				$form->setTitle("§b§lSub §f(§a-§f)");
				$form->addLabel("§ePlease Write The First Number Here:");
				$form->addInput("§bEnter The First Number Here:", "§f1");
				$form->addInput("§bEnter The Second Number Here:", "§f1");
				$form->sendToPlayer($sender);
    }

    public function Multiply($sender){ 
	    $form = new CustomForm(function (Player $sender, $data) {
                    if($data !== null){
                       $numbers1 = (int)$data[1];
                       $numbers2 = (int)$data[2];
                       $result = $numbers1 * $numbers2;
                       $sender->sendMessage("§aResult§f: §b".$result);
				    }
				});
				$form->setTitle("§b§lMultiply §f(§a*§f)");
				$form->addLabel("§ePlease Write The First Number Here:");
				$form->addInput("§bEnter The First Number Here:", "§f1");
				$form->addInput("§bEnter The Second Number Here:", "§f1");
				$form->sendToPlayer($sender);
    }

    public function Divide($sender){ 
	    $form = new CustomForm(function (Player $sender, $data) {
                    if($data !== null){
                       $numbers1 = (int)$data[1];
                       $numbers2 = (int)$data[2];
                       $result = $numbers1 / $numbers2;
                       $sender->sendMessage("§aResult§f: §b".$result);
				    }
				});
				$form->setTitle("§b§lDivide §f(§a/§f)");
				$form->addLabel("§ePlease Write The First Number Here:");
				$form->addInput("§bEnter The First Number Here:", "§f1");
				$form->addInput("§bEnter The Second Number Here:", "§f1");
				$form->sendToPlayer($sender);
    }
}
