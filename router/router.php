<?php
require "controllers/User_Controller.php";

class Router
{
    public $routes = [];
    public $controller = [];
    public function __construct()

    {
        $this->controller =  new User_Controller();
    }

    public function get($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];

    }

    public function post($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
        ];

    }

    public function route()
    {
        foreach ($this->routes as $route){
            if($route["uri"] === $_SERVER["REQUEST_URI"]){
                $action  = $route["controller"];
                switch ($action){
                    case "index":
                        $this->controller->index();
                        break;
                    case "add_db":
                        $this->controller->show_Database();
                        break;
                    case "create_database":
                        $this->controller->creating_Database($_POST);
                        break;
                    case "add_table":
                        $this->controller->show_Tables();
                        break;
                    case "create_table":
                        $this->controller->creating_Tables($_POST);
                        break;
                    case "add_row":
                        $this->controller->show_Records();
                        break;
                }
            }
        }
    }
}