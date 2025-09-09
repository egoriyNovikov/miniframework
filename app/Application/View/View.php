<?php
namespace App\Application\View;

use App\Exception\ViewException;

class View implements ViewInterface 
{
  public static function show(string $url, mixed $date = null) : void 
  {
    $path = __DIR__ . "/../../../view/{$url}.view.php";
    if(!file_exists($path)) {
      $content = @file_get_contents($path);
      $errorMessage = "View file not found: $path";
      
      if ($content === false) {
        $error = error_get_last();
        if ($error) {
          $errorMessage = $error['message'];
        }
      }
      throw new ViewException($url, $errorMessage);
    }
    extract($date);
    include ($path);
    
  }
}