<?php
namespace App\Controllers;

class WiitController extends Controller {

    public function index() {
        $this->views('Wiit/index.php', []);
    }

    public function create()
    {
      $this->validator->validate([
        "content" => ["required", "max:300"],
        "citation" => []
      ]);
      if (!$this->validator->hasErrors()) {
        $todo = $this->manager('WittManager')->create();
        $this->redirect('/');

      }else {
        $this->redirect('/create');
      }
    }

}
