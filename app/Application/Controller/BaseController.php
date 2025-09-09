<?php
namespace App\Application\Controller;

use App\Database\Database;

abstract class BaseController 
{
  protected $db;
  public function __construct()
  {
    $this->db = Database::getInstance();
  }
}