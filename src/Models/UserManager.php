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
        if (!empty($user)) {
        $user = $user[0];
        if (password_verify($password, $user->getPassword())) {
            $_SESSION["user"] = $user;
            $this->redirect("/");
        }
      }
      $this->redirect("/authentification");
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
    public function getAllSub() {
        if (isset($_SESSION["user"])) {
            $req = $this->pdo->prepare(
                "SELECT user.id, username, password, bio, mail, user.create_at FROM follow
                INNER JOIN user ON followed = user.id
                WHERE follow.user_id = :user_id
            ");
                $req->setFetchMode(\PDO::FETCH_CLASS, "\\App\\Models\\User");
                $req->execute([
                    "user_id" => $_SESSION["user"]->getId(),
                ]);
                return $req->fetchAll();
            }
        }
    public function getAllSubNum($id) {
        if (isset($_SESSION["user"])) {
            $req = $this->pdo->prepare(
                "SELECT COUNT(*) FROM follow
                INNER JOIN user ON follow.followed = user.id
                WHERE follow.followed = :user_id
            ");
            $req->setFetchMode(\PDO::FETCH_CLASS, "\\App\\Models\\User");
            $req->execute([
                "user_id" => $id,
            ]);
            return $req->fetch();
        }
    }
}
