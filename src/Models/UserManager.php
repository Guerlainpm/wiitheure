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
        }
    }
}