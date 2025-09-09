<?php
namespace App\Config;

interface ConfigIntreface 
{
  public static function list() : void;
  public static function get(string $var) : array|string|null;
}