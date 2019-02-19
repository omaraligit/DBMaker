<?php

namespace Notoro\DBBuilder;

class QueryBuilder
{
    public $query;

    public function createTable(string $tableName, DatabaseTable $tableColums){
        $this->query = "CREATE TABLE $tableName ( ";
        
    }
}
