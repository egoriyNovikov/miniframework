<?php
namespace App\Config;

use App\Config\ConfigIntreface;
use Codin\Dot\Dot;

class Config implements ConfigIntreface 
{
  private static array $IGNORE = ['.', '..'];
  private static array $result = [];

  public static function list() : void
  {
    $path = __DIR__ . '/../../config';
    $files = scandir($path);

    array_filter($files, function($var) use ($path) {
      if(!in_array($var, self::$IGNORE)) {
        self::$result[basename($var, '.php')] = include_once ($path .'/'. $var);
      }
    });
  }
  public static function get(string $var) : array|string|null
  {
    $dot = new Dot(self::$result);
    return $dot->get($var);
  }
}