<?php
namespace App\Application\View;

interface ViewInterface 
{
  public static function show(string $url) : void;
}