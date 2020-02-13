<?php
  namespace App\Models;
  /**
   *
   */
  class CommentManager extends Manager
  {
    public function getAllComments($post_id) {
      return $this->find([
        "post_id" => $post_id
      ], "\\App\\Models\\Comment");
    }
    public function createComment($post_id, $content) {
      if (isset($_SESSION["user"])) {
        $this->insert([
          "post_id" => $post_id,
          "user_id" => $_SESSION["user"]->getId(),
          "content" => $content
        ]);
      }
    }
    public function createCommentRep($post_id, $content, $comment_id) {
      if (isset($_SESSION["user"])) {
        $this->insert([
          "post_id" => $post_id,
          "user_id" => $_SESSION["user"]->getId(),
          "comment_id" => $comment_id,
          "content" => $content
        ]);
      }
    }
    public function updateComment($comment_id, $content) {
      $this->update([
        ["content" => $content],
        ["id" => $comment_id]
      ]);
    }
    public function deleteComment($user_id, $comment_id) {
      if (isset($_SESSION["user"]) && $user_id == $_SESSION["user"]->getId()) {
        $this->delete([
          "id" => $comment_id,
        ]);
      }
    }
  }
