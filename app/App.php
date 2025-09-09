<?php
namespace App;

use App\Router\Rout;
use App\Router\Router;

class App 
{
  public static function start() 
  {
      include __DIR__ . "/../router/view.php";
      include __DIR__ . "/../router/api.php";
      $router = new Router();
      $rout = (new Rout())->handle($router->list());
  }
}