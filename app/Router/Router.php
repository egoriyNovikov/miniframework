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
      'method' => $method,
      'http_method' => 'GET'
    ];
  }
  public static function post(string $rout, string $controller, string $method): void
  {
    self::$routs[] = [
      'url' => $rout,
      'controller' => $controller,
      'method' => $method,
      'http_method' => 'POST'
    ];
  }
  public static function put(string $rout, string $controller, string $method): void
  {
    self::$routs[] = [
      'url' => $rout,
      'controller' => $controller,
      'method' => $method,
      'http_method' => 'PUT'
    ];
  }
  public static function delete(string $rout, string $controller, string $method): void
  {
    self::$routs[] = [
      'url' => $rout,
      'controller' => $controller,
      'method' => $method,
      'http_method' => 'DELETE'
    ];
  }
  public function list(): array
  {
    return self::$routs;
  }
}
