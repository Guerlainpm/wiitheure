<?php
namespace App\Controllers;


class UserController extends Controller {

    public function showRegisterAndLogin() {
        $this->views('Auth/authentification.php', []);
    }
    //post VV
    public function register() {
      $_SESSION['old'] = $_POST;
        $this->validator->validate([
            "register-username" => ["required", "max:20", "alphaNumDash"],
            "register-mail" => ["required", "email"],
            "password" => ["required", "max:255", "confirm"],
            "passwordConfirm" => ["required"]
        ]);
        if(!$this->validator->hasErrors()) {
            $this->manager("UserManager", "user")->newUser(
                $_POST["register-username"],
                $_POST["password"],
                $_POST["register-mail"]
            );
            $this->redirect("/");
        } else {
            $this->redirect("/authentification");
        }
    }

    public function login() {
      $_SESSION['old'] = $_POST;
      $this->validator->validate([
          "login-username" => ["required"],
          "login-password" => ["required"],
          "login-mail" => ["required"]
      ]);
      if(!$this->validator->hasErrors()) {
          $this->manager("UserManager", "user")->login(
              $_POST["login-username"],
              $_POST["login-password"],
              $_POST["login-mail"]
          );
          $this->redirect("/");
      } else {
          $this->redirect("/authentification");
      }
    }

    public function delete() {
        if (isset($_SESSION["user"])) {
            $this->manager("UserManager", "user")->deleteUser();
        }
        $this->redirect("/");
    }

    public function logout() {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        $this->redirect("/");
    }
    public function follow($followed) {
        if (isset($_SESSION["user"])) {
            $this->manager("UserManager", "user")->follow($followed);
        }
    }

}
