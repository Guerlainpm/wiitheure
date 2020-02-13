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
          $todo = $this->manager('WittManager', "post")->newPost(
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
        return $this->manager('WittManager', "post")->getAllSubPostClass();
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
<<<<<<< HEAD
=======

>>>>>>> 73710204ab0b3577430e290862ee7e0ae2b0a07d
}
