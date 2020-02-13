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
                //var_dump($wiitController->getAllSubPost()["post"]);
                
                $wiitController->index();
                //var_dump($wiitController->getAllSubPost()[1]);
            }

            elseif ($this->url == "/authentification") {
                $userController->authPage();
            }

            elseif (preg_match('#^\/profile\/([0-9]+)$#', $this->url, $matches)) {
                $userController->profilePage($matches[1]);
            }
        }

        elseif ($this->method == "POST") {

            if (preg_match('#^\/profile\/([0-9]+)$#',$this->url,$matches)) {
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

<<<<<<< HEAD
            elseif ($this->url == "/delete/wiit") {
                $wiitController->delete();
            }

            elseif ($this->url == "/post/sub") {
                echo json_encode($wiitController->getAllSubPost());
=======
            elseif ($this->url == "/post/sub") {
                if (isset($_SESSION["user"])) {
                    echo json_encode($wiitController->getAllSubPost());
                }
            }

            elseif ($this->url == "/post/new") {
                echo json_encode($wiitController->getNewPost());
>>>>>>> 73710204ab0b3577430e290862ee7e0ae2b0a07d
            }

            elseif ($this->url == "/user/subs") {
                echo json_encode($wiitController->getAllSub());
            } 

            elseif ($this->url == "/connected") {
                if (isset($_SESSION["user"])) {
                    echo json_encode(true);
                } else {
                    echo json_encode(false);
                }
            }
<<<<<<< HEAD
=======
            elseif ($this->url == "/delete/wiit") {
                $wiitController->delete();
            }

            elseif (preg_match('#^\/profile\/([0-9]+)\/edit$#',$this->url,$matches)) {
                $userController->update();
            }
>>>>>>> 73710204ab0b3577430e290862ee7e0ae2b0a07d

        }


    }
}
