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

    public function column(string $columnName, array $params = [])
    {
        $this->columns[$columnName] = new \Notoro\DBBuilder\DatabaseColumn($columnName,$params);
    }

}