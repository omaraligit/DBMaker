<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 2/16/2019
 * Time: 11:49 AM
 */

namespace Notoro\DBBuilder;

class DatabaseColumn {
    public $name;
    public $metaData = [];


    public function __construct(string $name){
        $this->name = $name;
    }

    public function getType(){
        if(array_key_exists("type",$this->metaData))
            return mb_strtoupper($this->metaData["type"]);
    }

    public function getSize(){
        if(array_key_exists("size",$this->metaData))
            return "(".$this->metaData["size"].")";
        return "";
    }

    public function getPrimary(){
        $primary = "";
        if(array_key_exists("increment",$this->metaData))
            $primary.= " ".$this->metaData["increment"];
        if(array_key_exists("primary",$this->metaData))
            $primary.= " ".$this->metaData["primary"];
        return $primary;
    }


}