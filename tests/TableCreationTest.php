<?php

namespace Notoro\dbmaker\Tests;


use Notoro\DBBuilder\DBMaker;
use Notoro\DBBuilder\Exceptions\DBMakerException;
use PHPUnit\Framework\TestCase;

class TableCreationTest extends TestCase
{
    private $config;

    protected function setUp()
    {
        $this->config = require dirname(__DIR__)."/tests/configTest.php";
    }

    public function testConnectionNotMadeExeption()
    {
        $this->expectException(DBMakerException::class);
        $dbmaker = new DBMaker([
            "driver"=>"mysql",
            "mysql"=>[
                "host"=>"localhost:4000",
                "dbname"=>"php_package",
                "user"=>"root",
                "password"=>""
            ]
        ]);
    }

    public function testTableCreation()
    {
        $dbmaker = new DBMaker($this->config);
        $this->assertInstanceOf(DBMaker::class,$dbmaker);
        $this->assertIsArray($this->config);
    }

    public function testConnectionIsPdo()
    {
        $dbmaker = new DBMaker($this->config);
        $dbConnection = $dbmaker->getConnection();
        $this->assertInstanceOf(\PDO::class,$dbConnection);
    }


    public function testQueryString()
    {
        $dbmaker = new DBMaker($this->config);
        $stauts = $dbmaker->table('users', function (\Notoro\DBBuilder\DatabaseTable $databaseTable){
            $databaseTable->number('id',10)->primary();
            $databaseTable->string('nom',250)->unique()->default("hi");
            $databaseTable->date("bday")->default(\date("d/m/YY"))->isNull(true);
        });
        $this->assertEquals(true,true);
    }



}
