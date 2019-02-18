<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 2/16/2019
 * Time: 11:49 AM
 */

namespace Notoro\DBBuilder;


class DatabaseTable
{

    public $columns = [];

    public function string(string $columnName, int $size = 50)
    {
        $this->columns[$columnName] = new \Notoro\DBBuilder\DatabaseColumn($columnName);
        $this->columns[$columnName]->metaData["type"] = "VARCHAR";
        $this->columns[$columnName]->metaData["size"] = $size;
        return $this;
    }

    public function number(string $columnName, int $size = 50)
    {
        $this->columns[$columnName] = new \Notoro\DBBuilder\DatabaseColumn($columnName);
        $this->columns[$columnName]->metaData["type"] = "INT";
        $this->columns[$columnName]->metaData["size"] = $size;
        return $this;
    }

    public function date(string $columnName)
    {
        $this->columns[$columnName] = new \Notoro\DBBuilder\DatabaseColumn($columnName);
        $this->columns[$columnName]->metaData["type"] = "DATE";
        return $this;
    }
 
    public function primary(){
        end($this->columns)->metaData["primary"] = true;
        return $this;
    }
    
    public function unique(){
        end($this->columns)->metaData["unique"] = true;
        return $this;
    }

    public function isNull(bool $isnull = false){
        end($this->columns)->metaData["null"] = $isnull;
        return $this;
    }

    public function default(string $default = "")
    {
        end($this->columns)->metaData["default"] = $default;
        return $this;
    }

}