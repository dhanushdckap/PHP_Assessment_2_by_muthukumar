<?php


class User_Model extends database {
    public function create_Database($name){
        $databaseName = $name;
        $this->database->query("CREATE DATABASE $databaseName");
    }

    public function fetch_Database(){
        return $this->database->query("show databases")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function creating_Table($database_name,$table_name,$column_name,$data_type){
        $this->database->query("
        USE $database_name;
        CREATE TABLE $table_name (
        id int auto_increment,
        primary key (id)
        )
        ");
        for ($i=0;$i<count($column_name);$i++){
            $this->database->query("
                USE $database_name;
                ALTER TABLE $table_name ADD COLUMN $column_name[$i] $data_type[$i];
                ");
        }
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