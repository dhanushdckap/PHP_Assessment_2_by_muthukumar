<?php

class User_Model extends database {

    //create a database by getting name from the form.
    public function create_Database($name){

        $databaseName = $name;
        $this->database->query("CREATE DATABASE $databaseName");
    }

    // fetching the all databases name.
    public function fetch_Database(){

        return $this->database->query("show databases")->fetchAll(PDO::FETCH_ASSOC);
    }

    // creating a table with user given information.
    public function creating_Table($database_name,$table_name,$column_name,$data_type){

        $this->database->query("
        USE $database_name;
        CREATE TABLE $table_name (
        id int auto_increment,
        primary key (id)
        )
        ");

        // looping the array for set the user given data
        for ($i=0;$i<count($column_name);$i++){
            $this->database->query("
                USE $database_name;
                ALTER TABLE $table_name ADD COLUMN $column_name[$i] $data_type[$i];
                ");
        }
        header("location:/");
    }

    //try to get the table for the inserting the values in the table.
    public function getTable($datbaseName){

        return $this->database->query("SELECT TABLE_NAME AS tablesname,TABLE_SCHEMA FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$datbaseName';")->fetchAll(PDO::FETCH_OBJ);

    }

    //try to get the column_name for inserting the values in the table.
    public function getRow($database,$tableName){

        $row = $this->database->query("SELECT column_name as columns FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$database' AND `TABLE_NAME`='$tableName'");
        $row = $row->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

}

// connecting database.
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