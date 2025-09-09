<?php
namespace App\Exception;

use Exception;

class NotFoundException extends Exception 
{
  public function __construct(string $code) 
  {
    $path = __DIR__ . "/../../view/default/404.view.php";
    if(!file_exists($path)) {
      echo "<h1>404 NOT FOUND</h1>";
      echo "<pre>$code</pre>";
      return;
    }

    extract([
      'title' => '404 NOT FOUND',
      'error' => $code,
    ]);
    include ($path);
  }
}