<?php

namespace App\Models;

class UserManager extends \App\Models\Manager {
    public function newUser(string $username, string $password, string $mail) {
        $this->insert([
            "username" => htmlspecialchars($username, ENT_QUOTES),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "mail" => htmlspecialchars($mail, ENT_QUOTES),
        ]);
    }
    public function login(string $username, string $password, string $mail) {
        $user = $this->find([
            "username" => htmlspecialchars($username, ENT_QUOTES),
            "mail" => htmlspecialchars($mail, ENT_QUOTES),
        ], );
        password_verify('rasmuslerdorf', $hash);
    }
}