<?php
namespace App\Exception;

use Exception;

class ViewException extends Exception 
{
  public function __construct($url, $message)
  {
    $path = __DIR__ . "/../../view/default/viewexception.view.php";
    $errorMessage = $message;
    if($message) {
      $errorMessage = $message;
    } else {
      $errorMessage = "View not found";
    }

    parent::__construct($errorMessage);

    if(!file_exists($path)) {
      echo "<h1>$url</h1><hr>\n";
      echo "<pre>{$this->getMessage()}</pre>";
      return;
    }
    extract([
      'title' => 'View file not found: $url',
      'error' => $this->getMessage(),
    ]);
    include ($path);
  }
}