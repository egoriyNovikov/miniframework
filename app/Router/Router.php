<?php

namespace App\Router;

use App\Router\RouterInterface;

class Router implements RouterInterface
{
  private static array $routs = [];
  public static function get(string $rout, string $controller, string $method): void
  {
    self::$routs[] = [
      'url' => $rout,
      'controller' => $controller,
      'method' => $method
    ];
  }
  public function list(): array
  {
    return self::$routs;
  }
}
