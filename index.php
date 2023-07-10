<?php
session_start();
require "router/router.php";
$controller = new Router();


$controller->post("/","index");
$controller->post("/add_db","add_db");
$controller->post("/create_database","create_database");
$controller->post("/add_table","add_table");
$controller->post("/create_table","create_table");
$controller->post("/add_row","add_row");

$controller->route();







