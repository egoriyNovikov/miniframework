<?php

namespace App\Router;

class Rout implements RoutInterface {
  public function handle(array $routs) : void {
    foreach($routs as $rout) {
      if($_SERVER['REQUEST_URI'] == $rout['url']) {
        $method = $rout['method'];
        $page = new $rout['controller']();
        $page->$method();
      }
    }
  }
}