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
    public $primary = false;
    public $unique  = false;
    public $type    = "VARCHAR";
    public $null    = false;
    public $default = null;
    public function __construct(string $name, $params = []){
        $this->name = $name;
        if(!empty($params)){
            $this->primary  = $params['primary'];
            $this->unique   = $params['unique'];
            $this->type     = $params['type'];
            $this->null     = $params['null'];
            $this->default  = $params['default'];   
        }

    }


}