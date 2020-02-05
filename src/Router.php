<?php
namespace App;


class Router {
    private $method;
    private $url;

    public function __construct() {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->url = $_SERVER["REQUEST_URI"];
    }

    public function run() {
        $userController = new UserController();
        $wittController = new WittController();

        if ($this->method == "GET") {

            if ($this->url == "/") {
                $wittController->index(); 
            }

            elseif ($this->url == "/authentification") {
                $userController->showRegisterAndLogin();
            }
        }
       
        elseif ($this->method == "POST") {

            if (preg_match('#^\/profil\/([0-9]+)$#',$this->url,$match)) {
                $wittController->show($match[1]);
            }
    
            elseif ($this->url == "/login") {
                $userController->login();
            }
    
            elseif ($this->url == "/register") {
                $userController->register();
            }
    
            elseif ($this->url == "/logout") {
                $userController->logout();
            }
    
        }


    }    
}
