<?php
require "models/User_Model.php";

class User_Controller{
    private $userModel;

    public function __construct() {
        $this->userModel = new User_Model();
    }

    // function for the home page.
    public function index() {
        require "views/products/home.view.php";
    }

    // redirecting to create database page
    public function show_Database(){
        require "views/products/create_Database.view.php";
    }

    // create database in the phpmyadmin and redirecting to home page.
    public function creating_Database($databaseName){
        $this->userModel->create_Database($databaseName["db-name"]);
        header("location: / ");
    }

    // fetch the database for the phpmyadmin and redirecting to create table page
    public function show_Tables(){
        $all_database =  $this->userModel->fetch_Database();
        require "views/products/add_Tables.php";

    }

    //creating the table to the selected database.
    public function creating_Tables($tableData){
        $database_name = $tableData["database"];
        $table_name = $tableData["table-name"];
        $column_name = $tableData["column-name"];
        $data_type = $tableData["data-type"];
        $this->userModel->creating_Table($database_name,$table_name,$column_name,$data_type);
    }

    // try to get the databases from the phpmyadmin.
    public function show_Records(){
        $databae = $this->userModel->fetch_Database();
        require "views/products/add_Records.php";
    }

    //try to get the table from the selected database and encoding the data.
    public function getTable($data){
        $getTable = $this->userModel->getTable($data);
        echo json_encode($getTable);
    }

    // try to get the table and column information.
    public function getRow($insetRow){

        $tableName = $insetRow['tbName'];
        $databaseName = $insetRow["database"];
        $tableData =  $this->userModel->getRow($databaseName,$tableName);
        echo json_encode($tableData);

    }


}