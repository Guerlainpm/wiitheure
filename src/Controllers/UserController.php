<?php
namespace App\Controllers;


class UserController extends Controller {

    public function authPage() {
        $this->views('Auth/authentification.php');
    }

    public function profilePage($id) {
      if (isset($_SESSION['user'])) {
        $this->views('Auth/profile.php');
      }else {
        $this->redirect('/');
      }
    }

    public function follow() {
        if (isset($_SESSION["user"])) {
            $this->manager("UserManager", "user")->follow($_POST["followed"]);
        }
        $this->redirect("/");
    }
    public function unfollow() {
        if (isset($_SESSION["user"])) {
            $this->manager("UserManager", "user")->unfollow($_POST["followed"]);
        }
        $this->redirect("/");
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

    public function update()
    {
      $this->validator->validate([
          "username" => ["required","min:2"],
          "mail" => ["required","email"]
      ]);

      if(!$this->validator->hasErrors()) {
          $this->manager('UserManager', 'user')->update([
            'username'=>$_POST["username"],
            'mail'=>$_POST["mail"],
            'bio'=>$_POST["bio"]],
            ['id'=>$_SESSION["user"]->getId()]);

          $user = $this->manager('UserManager', 'user')->find(['id'=>$_SESSION['user']->getId()], "\\App\\Models\\User")[0];
          $_SESSION['user'] = $user;
      }
      $this->redirect("/profile".'/'.$_SESSION['user']->getId());
    }
}
