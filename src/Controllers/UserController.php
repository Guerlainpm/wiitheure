<?php
namespace App\Controllers;


class UserController extends Controller {

    public function showRegisterAndLogin() {
        $this->views('Auth/authentification.php', []);
    }
    //post VV
    public function register() {
        /*$this->validator->validate([
            "username" => ["required", "max20", "alphaNumDash"],
            "mail" => ["required", "email"],
            "password" => ["required", "max255"],
            "confirm" => []
        ]);*/
        if(!$validator->errors()) {
            $this->manager("UserManager").newUser(
                POST_["username"],
                POST_["password"],
                POST_["mail"]
            );
        }
    }

    public function login() {
        $this->manager("UserManager", "user")->login(
            "username",
            "password",
            "121212121"
        );
    }

}