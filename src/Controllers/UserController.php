<?php
namespace App\Controllers;


class UserController extends Controller {

    public function showRegisterAndLogin() {
        $this->views('Auth/authentification.php', []);
    }
    //post VV
    public function register() {
        $this->validator->validate([
            "username" => ["required", "max:20", "alphaNumDash"],
            "mail" => ["required", "email"],
            "password" => ["required", "max:255", "confirm"],
            "passwordConfirm" => []
        ]);
        if(!$validator->hasErrors()) {
            $this->manager("UserManager").newUser(
                POST_["username"],
                POST_["password"],
                POST_["mail"]
            );
        }
    }

    public function login() {
        $this->manager("UserManager", "user")->login(
            $_POST["username"],
            $_POST["password"],
            $_POST["mail"]
        );
    }

}