<?php


class User_Model extends database {
    public function create_Database($name){
        $databaseName = $name;
        $this->database->query("CREATE DATABASE $databaseName");
    }

    public function fetch_Database(){
        return $this->database->query("show databases")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function creating_Table($tableData){
        $databaseName = $tableData["database"];
        $tableName = $tableData["table-name"];
        $coulmnName = $tableData["column-name"];
        $dataType = $tableData["data-type"];

        $this->database->query("
            USE $databaseName;
            create table $tableName(
                id int not null AUTO_INCREMENT,
                $coulmnName $dataType,
                primary key(id)
            );
        ");
        header("location:/");
    }


}




class Database{
    public $database;
    public function __construct()
    {
        try{
            $this->database = new PDO('mysql:host=localhost','root','welcome');
        }
        catch (exception $e){;
            die("connection error".$e->getMessage());
        }
    }
}