<?php
namespace App\Controllers;


class UserController extends Controller {

    public function showRegisterAndLogin() {
        $this->views('Auth/authentification.php', []);
    }

}