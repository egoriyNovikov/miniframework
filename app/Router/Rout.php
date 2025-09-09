<?php

namespace App\Router;

use App\Exception\NotFoundException;

class Rout implements RoutInterface 
{
  public function handle(array $routs) : void {
    $found = false;
    foreach($routs as $rout) {
      if($_SERVER['REQUEST_URI'] == $rout['url']) {
        $method = $rout['method'];
        $page = new $rout['controller']();
        $found = true;
        echo $page->$method();
        break;
      }
    }
    
    if(!$found) {
      throw new NotFoundException("Page not found");
    }
  }
}