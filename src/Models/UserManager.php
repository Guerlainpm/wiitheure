<?php

namespace App\Models;

class UserManager extends \App\Models\Manager {
    public function newUser(string $username, string $password, string $mail) {
        $this->insert([
            "username" => htmlspecialchars($username, ENT_QUOTES),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "mail" => htmlspecialchars($mail, ENT_QUOTES),
        ]);
        $this->login($username, $password, $mail);
    }
    public function login(string $username, string $password, string $mail) {
        $user = $this->find([
            "username" => htmlspecialchars($username, ENT_QUOTES),
            "mail" => htmlspecialchars($mail, ENT_QUOTES),
        ], "\\App\\Models\\User");
        $user = $user[0];
        if (password_verify($password, $user->getPassword())) {
            $_SESSION["user"] = $user;
            $this->redirect("/");
        } else {
            $this->redirect("/authentification");
        }
    }
    public function deleteUser() {
        $this->delete([
            "id" => $_SESSION["user"]->getId()
        ]);
    }
    public function follow($followed) {
        if ($user_id != $_SESSION["user"]->getId()) {
            $req = $this->pdo->prepare("INSERT INTO follow (user_id, followed) VALUES (:user_id, :followed);");
            $req->execute([
                "user_id" => $_SESSION["user"]->getId(),
                "followed" => $followed
            ]);
        }
    }
    public function getAllSubPost() {
        if (isset($_SESSION["user"])) {
            /*$user = $this->find([
                "id" => $_SESSION["user"]->getId(),
                "mail" => htmlspecialchars($mail, ENT_QUOTES),
            ], "\\App\\Models\\User");*/
        }
        /*if ($user_id != $_SESSION["user"]->getId()) {
            $req = $this->pdo->prepare("INSERT INTO follow (user_id, followed) VALUES (:user_id, :followed);");
            $req->execute([
                "user_id" => $_SESSION["user"]->getId(),
                "followed" => $followed
            ]);
        }*/
    }
}