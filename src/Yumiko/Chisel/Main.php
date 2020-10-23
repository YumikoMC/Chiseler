<?php

namespace Yumiko\Chisel;



use pocketmine\block\Block;
use pocketmine\block\Wood;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {


    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        if(!file_exists($this->getDataFolder() . "config.yml")){
            $config = new Config($this->getDataFolder() . 'config.yml',Config::YAML);
            $config->set("item-id",468);
            $config->save();
        }
    }

    public function OnInteract(PlayerInteractEvent $event){
        $item = $event->getPlayer()->getInventory()->getItemInHand();
        $block = $event->getBlock();
        $config = new Config($this->getDataFolder() . 'config.yml',Config::YAML);
        $itemid = $config->get('item-id');

        if($item->getId() === $itemid){
            if($event->getPlayer() instanceof Player){
                // Wood
                if($block->getId() === 5 && $block->getDamage() > 5){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(5,$block->getDamage() + 1));
                }elseif($block->getId() == 5 && $block->getDamage() === 5) {
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(5,0));
                }

                // Wool
                if($block->getId() === 35 && $block->getDamage() < 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(35,$block->getDamage() + 1));

                }elseif($block->getId() === 35 && $block->getDamage() === 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(35,0));

                }
                // Clay
                if($block->getId() === 159 && $block->getDamage() < 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(159,$block->getDamage() + 1));

                }elseif($block->getId() === 159 && $block->getDamage() === 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(159,0));

                }
                // Glass

                if($block->getId() === 241 && $block->getDamage() < 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(159,$block->getDamage() + 1));

                }elseif($block->getId() === 159 && $block->getDamage() === 15){
                    $event->getPlayer()->getLevel()->setBlock($block->asVector3(),Block::get(159,0));

                }


            }
        }
    }
}
