<?php

namespace App\Router;

use App\Exception\NotFoundException;

class Rout implements RoutInterface 
{
  public function handle(array $routs) : void {
    $found = false;
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    foreach($routs as $rout) {
      if($requestPath == $rout['url'] && $requestMethod == $rout['http_method']) {
        $method = $rout['method'];
        $page = new $rout['controller']();
        $found = true;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        echo $page->$method($id);
        break;
      }
    }
    
    if(!$found) {
      throw new NotFoundException("Page not found");
    }
  }
}