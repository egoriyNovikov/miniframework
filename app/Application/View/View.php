<?php
namespace App\Application\View;


class View implements ViewInterface 
{
  public static function show(string $url) : void 
  {
    $path = __DIR__ . "/../../../view/{$url}.view.php";
    include ($path);
    
  }
}