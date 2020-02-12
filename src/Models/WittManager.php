<?php

namespace App\Models;

class WittManager extends Manager {
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
      ORDER BY post.create_at ASC
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
      return $posts;
    }
  }
    public function deleteWiit()
    {
      $this->delete([
        "id" => $_SESSION["user"]->getId()
      ]);
    }
  public function getAllSubPost() {
    $req = $this->pdo->prepare(
      "SELECT followed, post.id, citation, post.create_at, username, content FROM follow
      INNER JOIN post ON post.user_id = follow.followed
      INNER JOIN user ON user.id = follow.followed
      WHERE follow.user_id = :user_id
      ORDER BY post.create_at ASC
    ");
    $req->execute([
      "user_id" => 1
    ]);
    $posts = $req->fetchAll();
    return $posts;
  }
}
