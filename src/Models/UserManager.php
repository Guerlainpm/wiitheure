<?php

namespace App\Models;

class UserManager extends \App\Models\Manager {
    public function newUser(string $username, string $password, string $mail) {
        $this->insert([
            "username" => htmlspecialchars($username, ENT_QUOTES),
            "password" => "sqs",
            "mail" => htmlspecialchars($mail, ENT_QUOTES),
        ]);
    }
}