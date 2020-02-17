<?php
namespace App;
use App\Controllers\UserController;
use App\Controllers\WiitController;
use App\Controllers\CommentController;

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
        $commentController = new CommentController();

        if ($this->method == "GET") {

            if ($this->url == "/") {
                if (isset($_SESSION["user"])) {
                    $wiitController->index();
                } else {
                    header("Location: /authentification");
                }
            }

            elseif ($this->url == "/news") {
                $wiitController->indexNews();
            }

            elseif ($this->url == "/authentification") {
                $userController->authPage();
            }

            elseif (preg_match('#^\/profile\/([0-9]+)$#', $this->url, $matches)) {
                $userController->profilePage($matches[1]);
            }
            elseif (preg_match('#^\/post\/([0-9]+)$#', $this->url, $matches)) {
                $wiitController->show($matches[1]);
            }
        }

        elseif ($this->method == "POST") {

            if (preg_match('#^\/profile\/([0-9]+)$#',$this->url,$matches)) {
                $wiitController->show($matches[1]);
            }
            elseif ($this->url == "/search") {
                $wiitController->search();
            }
            elseif (preg_match('#^\/comment\/create\/([0-9]+)$#', $this->url, $matches)) {
                $commentController->createComment($matches[1]);
            }
            elseif (preg_match('#^\/comment\/rep\/create\/([0-9]+)$#', $this->url, $matches)) {
                $commentController->createCommentRep($matches[1]);
            }
            elseif ($this->url == "/follow") {
                $userController->follow();
            }
            elseif ($this->url == "/unfollow") {
                $userController->unfollow();
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

            elseif (preg_match('#^\/profile\/([0-9]+)\/edit$#',$this->url,$matches)) {
                $userController->update();
            }

        }


    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }
}
