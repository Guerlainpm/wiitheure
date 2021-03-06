<?php

namespace App\Models;

class WiitManager extends Manager {
  public function newPost($content, $user_id) {
    $this->insert([
      "content" => htmlspecialchars($content),
      "user_id" => $user_id
    ]);
  }
  public function newCitation($content, $user_id, $post_id) {
    $this->insert([
      "content" => htmlspecialchars($content),
      "user_id" => $user_id,
      "citation" => $post_id
    ]);
  }
  public function deletePost($post_id) {
    $this->delete([
      "id" => $post_id
    ]);
  }
  public function updatePost($content, $post_id) {
    $this->update([
      [
        "content" => $content
      ],
      [
        "id" => $post_id
      ]
    ]);
  }
  public function getAllSubPostClass() {
    $req = $this->pdo->prepare(
      "SELECT followed, post.id, citation, post.create_at, username, content FROM follow
      INNER JOIN post ON post.user_id = follow.followed
      INNER JOIN user ON user.id = follow.followed
      WHERE follow.user_id = :user_id
      ORDER BY post.create_at DESC
    ");
    $req->execute([
      "user_id" => $_SESSION["user"]->getId()
    ]);
    $postsNotObj = $req->fetchAll();
    $posts = [];
    foreach ($postsNotObj as $key => $postNotObj) {
      foreach ($postNotObj as $postKey => $value) {
        $value = htmlspecialchars($value);
      }
      $post = new \App\Models\Wiit();
      $post->constructor($postNotObj["content"], $postNotObj["create_at"], $postNotObj["citation"], $postNotObj["id"], $postNotObj["followed"]);
      $req = $this->pdo->prepare("SELECT * FROM user WHERE id=:id;");
      $req->setFetchMode(\PDO::FETCH_CLASS, "\\App\\Models\\User");
      $req->execute([
        "id" => $postNotObj["followed"]
      ]);
      $user = $req->fetch();
      array_push($posts, ["post" => $post, "user" => $user]);
    }
    return $posts;
  }
  public function getAllSubPost() {
    $req = $this->pdo->prepare(
      "SELECT followed, post.id, citation, post.create_at, username, content FROM follow
      INNER JOIN post ON post.user_id = follow.followed
      INNER JOIN user ON user.id = follow.followed
      WHERE follow.user_id = :user_id
      ORDER BY post.create_at DESC
    ");
    $req->execute([
      "user_id" => $_SESSION["user"]->getId()
    ]);
    $posts = $req->fetchAll();
    return $posts;
  }
  public function getNewPost() {
    $req = $this->pdo->prepare(
      "SELECT user.id as user_id, post.id, citation, post.create_at, username, content FROM post
      INNER JOIN user ON post.user_id = user.id
      ORDER BY post.create_at DESC
    ");
    $req->execute();
    $postsNotObj = $req->fetchAll();
    $posts = [];
    foreach ($postsNotObj as $key => $postNotObj) {
      foreach ($postNotObj as $postKey => $value) {
        $value = htmlspecialchars($value);
      }
      $post = new \App\Models\Wiit();
      $post->constructor($postNotObj["content"], $postNotObj["create_at"], $postNotObj["citation"], $postNotObj["id"], $postNotObj["user_id"]);
      $req = $this->pdo->prepare("SELECT * FROM user WHERE id=:id;");
      $req->setFetchMode(\PDO::FETCH_CLASS, "\\App\\Models\\User");
      $req->execute([
        "id" => $postNotObj["user_id"]
      ]);
      $user = $req->fetch();
      array_push($posts, ["post" => $post, "user" => $user]);
    }
    return $posts;
  }
  public function deleteWiit()
  {
    $this->delete([
      "id" => $_SESSION["user"]->getId()
    ]);
  }
  public function search($regex) {
    $req = $this->pdo->prepare("SELECT * FROM post WHERE content REGEXP \"$regex\";");
    $req->setFetchMode(\PDO::FETCH_CLASS, "App\\Models\\Wiit");
    $req->execute();
    return $req->fetchAll();
  }
}
