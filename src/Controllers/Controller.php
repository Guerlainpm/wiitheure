<?php
namespace App\Controllers;
/**
 *
 */
class Controller
{

  protected $validator;

  function __construct()
  {
    $this->validator = new \App\Validator();
  }

  public function redirect($url)
  {
    header("Location: ".$url);
    exit();
  }

  public function views($url, $data = [])
  {
    require VIEWS.$url;
  }

  public function manager($manager, $table)
  {
    $name = 'App\\Models\\'.$manager;
    $manager = new $name($table);
    return $manager;
  }
}
