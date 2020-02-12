<?php
namespace App\Controllers;

class WiitController extends Controller {

    public function index() {
        $this->views('Wiit/index.php', ["posts" => $this->getAllSubPost(), "sub" => $this->getAllSub()]);

    }

    public function create()
    {
      if (isset($_SESSION["user"])) {
        $this->validator->validate([
          "content" => ["required", "max:300"],
          "citation" => []
        ]);
        if (!$this->validator->hasErrors()) {
          $todo = $this->manager('WittManager', "post")->create(
            $_POST["content"],
            $_SESSION["user"]->getId()
          );
          $this->redirect('/');
        }else {
          $this->redirect('/create');
        }
      }
    }
    public function getAllSubPost() {
      if (isset($_SESSION["user"])) {
        return $this->manager('WittManager', "post")->getAllSubPost();
      } else {
        return [];
      }
    }

    public function getAllSub() {
      return $this->manager('UserManager', "user")->getAllSub();
    }
    public function getNewPost() {
      return $this->manager('WittManager', "post")->getNewPost();
    }
    public function delete()
    {
      if (isset($_SESSION["user"])) {
        $this->manager('WiitManager')->deleteWiit();
      }

    }

}
