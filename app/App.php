<?php
namespace App;

use App\Application\Controller\LibraryController;
use App\Application\Controller\PageController;
use App\Router\Rout;
use App\Router\Router;
use Exception;

class App 
{
  public static function start() 
  {
    try {
      Router::get('/', PageController::class, 'home');
      Router::get('/about', PageController::class, 'about');
      Router::get('/api/', LibraryController::class, 'get');
      $router = new Router();
      $rout = (new Rout())->handle($router->list());
    }catch (Exception $e) {
      echo $e->getMessage();
    }
    

  }
}