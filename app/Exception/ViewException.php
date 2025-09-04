<?php
namespace App\Exception;

use Exception;

class ViewException extends Exception 
{
  public function __construct($url)
  {
    echo "<pre>Not correct $url</pre>";
  }
}