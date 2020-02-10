<?php
  namespace \App\Models;
  /**
   *
   */
  class ClassName extends Manager
  {
    protected $table = "post";

    public function create($content, $user_id)
    {
      $this->insert([
        "content" => htmlspecialchars($content),
        "user_id" => $user_id
      ])
    }
  }
