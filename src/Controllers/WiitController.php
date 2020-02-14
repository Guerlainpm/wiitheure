<?php
namespace App\Controllers;

class WiitController extends Controller {

    public function index() {
        $this->views('Wiit/index.php', ["posts" => $this->getAllSubPost(), "sub" => $this->getAllSub()]);

    }
    public function indexNews() {
      $this->views('Wiit/index.php', ["posts" => $this->getNewPost(), "sub" => $this->getAllSub()]);
    }
    public function show($pos_id) {
      $this->views('Wiit/show.php', ["post" => [
        "post" => $this->getOnePost($pos_id),
        "user" => $this->getOneUser($this->getOnePost($pos_id)->getUserId())],
        "comments" => $this->getComment($pos_id),
        "sub" => $this->getAllSub()
      ]);
    }
    public function getComment($post_id) {
      $commentsAndUser = [];
      $comments = $this->manager('CommentManager', "comment")->getAllComments($post_id);
      foreach ($comments as $key => $comment) {
        $user = $this->manager('UserManager', "user")->find(["id" => $comment->getUser_id()], "\\App\\Models\\User")[0];
        array_push($commentsAndUser, ["comment" =>$comment, "user" => $user]);
      }
      return $commentsAndUser;
    }
    public function getOnePost($id) {
      return $todo = $this->manager('WiitManager', "post")->find([
        "id" => $id
      ], "\\App\\Models\\Wiit")[0];
    }
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
    public function getOneUser($id) {
      return $this->manager('UserManager', "user")->find([
        "id" => $id
      ], "\\App\\Models\\User")[0];
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
