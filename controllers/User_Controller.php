<?php
require "models/User_Model.php";

class User_Controller{
    private $userModel;

    public function __construct() {
        $this->userModel = new User_Model();
    }

    public function index() {
        require "views/products/home.view.php";
    }
    public function show_Database(){
        require "views/products/create_Database.view.php";
    }
    public function creating_Database($databaseName){
        $this->userModel->create_Database($databaseName["db-name"]);
        header("location: / ");
    }
    public function show_Tables(){
        $allDb =  $this->userModel->fetch_Database();
        require "views/products/add_Tables.php";

    }
    public function creating_Tables($tableData){
        $this->userModel->creating_Table($tableData);
    }
    public function show_Records(){
        $databae = $this->userModel->fetch_Database();

        require "views/products/add_Records.php";
    }

}