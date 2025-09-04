<?php

namespace App\Router;

interface RouterInterface {
  public static function get(string $rout, string $controller, string $method) : void;
  public function list() : array; 
}