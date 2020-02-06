<?php
session_start();
define('SRC',__DIR__ . '/../src/');
define('VIEWS',__DIR__ . '/../src/Views/');

/*try
{
    $bdd = new PDO('mysql:host=localhost;dbname=wiitheure;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
*/


require '../vendor/autoload.php';

$test = new \App\Controllers\UserController();

$test->login();

require SRC . 'helper.php';
$router = new App\Router();
$router->run();
