<?php
namespace App\Controllers;

class WiitController extends Controller {

    public function index() {
        $this->views('Wiit/index.php', ["posts" => $this->getAllSubPost(), "sub" => $this->getAllSub()]);

    }
    public function indexNews() {
      $this->views('Wiit/index.php', ["posts" => $this->getNewPost(), "sub" => $this->getAllSub()]);
    }
    public function show() {
      $this->views('Wiit/show.php', ["post" => $this->getNewPost(), "sub" => $this->getAllSub()]);
    }
    public function getOnePost() {}
    public function create()
    {
      if (isset($_SESSION["user"])) {
        $this->validator->validate([
          "content" => ["required", "max:300"],
          "citation" => []
        ]);
        if (!$this->validator->hasErrors()) {
          $todo = $this->manager('WiitManager', "post")->newPost(
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
        return $this->manager('WiitManager', "post")->getAllSubPostClass();
      } else {
        return [];
      }
    }

    public function getAllSub() {
      return $this->manager('UserManager', "user")->getAllSub();
    }
    public function getNewPost() {
      return $this->manager('WiitManager', "post")->getNewPost();
    }
    public function delete()
    {
      if (isset($_SESSION["user"])) {
        $this->manager('WiitManager')->deleteWiit();
      }
    }
}
