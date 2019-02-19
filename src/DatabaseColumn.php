<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 2/16/2019
 * Time: 11:49 AM
 */

namespace Notoro\DBBuilder;

class DatabaseColumn {
    public $columnName;
    public $metaData = [];


    public function __construct(string $columnName){
        $this->columnName = $columnName;
    }

    public function getName(){
        return $this->columnName;
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

    public function getDefault(){
        $default = "";
        if(array_key_exists("default",$this->metaData))
            $default.= " ".$this->metaData["default"];
        return $default;
    }

    public function getNull(){
        $null = "";
        if(array_key_exists("null",$this->metaData))
            $null.= " ".$this->metaData["null"];
        return $null;
    }

    public function getUnique(){
        $unique = "";
        if(array_key_exists("unique",$this->metaData))
            $unique.= " ".$this->metaData["unique"];
        return $unique;
    }

}