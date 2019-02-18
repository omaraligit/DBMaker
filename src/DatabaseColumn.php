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


}