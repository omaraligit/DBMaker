<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 2/16/2019
 * Time: 1:59 AM
 */

namespace Notoro\DBBuilder;



use Notoro\DBBuilder\Exceptions\DBMakerException;

class DBMaker
{

    /**
     * @var array
     */
    private $config;
    /**
     * @var \PDO
     */
    private $connection;


    /**
     * DatabaseMaker constructor.
     * @param array $config
     * @throws DBMakerException
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->SetUpConnection();

    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * make a new connection Object
     */
    public function SetUpConnection()
    {
        $driver = $this->config["driver"];
        $connectionConfig = $this->config[$driver];
        try{
            $this->connection = new \PDO(
                "$driver:host={$connectionConfig["host"]};dbname={$connectionConfig["dbname"]}",
                "{$connectionConfig["user"]}",
                "{$connectionConfig["password"]}",
                []
            );
        }catch (\Exception $e){
            throw new DBMakerException($e->getMessage(),$e->getCode());
        }

    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $tableName
     * @param callable $tableColumns
     * @return mixed
     */
    public function table($tableName,callable $databaseTableFun)
    {
        $tableColumns = new \Notoro\DBBuilder\DatabaseTable();
        call_user_func_array($databaseTableFun,[$tableColumns]);
        var_dump($tableColumns->columns);
        //$query = (new \Notoro\DBBuilder\QueryBuilder())->createTable($tableName,$tableColumns);
        //var_dump($query);
    }


}