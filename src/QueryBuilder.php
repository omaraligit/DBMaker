<?php

namespace Notoro\DBBuilder;

class QueryBuilder
{
    public $query;

    public function createTable(string $tableName, DatabaseTable $tableColums){
        $this->query = "CREATE TABLE $tableName ( ";
        foreach ($tableColums->columns as $column) {
            $this->query .= "{$column->name} {$column->type}({$column->size}) ,";
        }
        return $this->query;
    }
}
