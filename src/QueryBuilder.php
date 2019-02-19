<?php

namespace Notoro\DBBuilder;

class QueryBuilder
{
    public $query;

    public function createTable(string $tableName, DatabaseTable $tableColums){
        $this->query = "CREATE TABLE $tableName ( ";
        $i=0;
        $columnCount = count($tableColums->columns);
        foreach ($tableColums->columns as $key => $column) {
            var_dump($key);
            $this->query .= "{$column->getName()} {$column->getType()}{$column->getSize()} {$column->getPrimary()} {$column->getNull()} {$column->getUnique()} {$column->getDefault()}";
            $i++;
            if($i != $columnCount)
                $this->query .= ",";
            else
                $this->query .= "";
        }
        $this->query .= ");";
        return $this;
    }
}
