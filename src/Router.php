<?php
namespace App;
use App\Controllers\UserController;
use App\Controllers\WiitController;

class Router {
    private $method;
    private $url;

    public function __construct() {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->url = $_SERVER["REQUEST_URI"];
    }

    public function run() {
        $userController = new UserController();
        $wiitController = new WiitController();

        if ($this->method == "GET") {

            if ($this->url == "/") {
                $wiitController->index();
            }

            elseif ($this->url == "/authentification") {
                $userController->showRegisterAndLogin();
            }
        }

        elseif ($this->method == "POST") {

            if (preg_match('#^\/profil\/([0-9]+)$#',$this->url,$match)) {
                $wiitController->show($match[1]);
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

            elseif ($this->url == "/create/wiit") {
                $wiitController->create();
            }

            elseif ($this->url == "/delete/wiit") {
                $wiitController->delete();
            }


        }


    }
}
