<?php
namespace App\Controllers;
/**
   *
   */
  class CommentController extends Controller
  {
    public function getAllComments($post_id) {
      $this->manager("CommentManager", "comment")->getAllComments($post_id);
    }
    public function createComment($post_id) {
      $this->validator->validate([
        "content" => ["required", "max:255"],
      ]);
      if(!$this->validator->hasErrors()) {
        $this->manager("CommentManager", "comment")->createComment(
          $post_id,
          $_POST["content"]
        );
      }
      $this->redirect($_POST["url"]);
    }
    public function createCommentRep($post_id) {
      $this->validator->validate([
        "content" => ["required", "max:255"],
      ]);
      if(!$this->validator->hasErrors()) {
        $this->manager("CommentManager", "comment")->createCommentRep(
          $post_id,
          $_POST["content"],
          $_POST["comment_id"]
        );
      }
      $this->redirect($_POST["url"]);
    }
    public function updateComment() {
      
    }
    public function deleteComment() {
      
    }
  }
