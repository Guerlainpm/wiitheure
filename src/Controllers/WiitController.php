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
        $this->manager('WittManager')->create(
          $_POST["content"],
          $_SESSION["user"]->getId()
        );
        $this->redirect('/');

      }else {
        $this->redirect('/create');
      }
    }

    public function delete()
    {
      if (isset($_SESSION["user"])) {
        $this->manager('WiitManager')->deleteWiit();
      }

    }

}
