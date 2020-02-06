<?php
namespace App\Controllers;

class WiitController extends Controller {

    public function index() {
        $this->views('Wiit/index.php', []);
    }
}