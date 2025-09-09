<?php
namespace App\Application\Controller;

use App\Database\Database;


abstract class ApiController 
{
  protected $db;
  public function __construct(){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Methods: GET");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $this->db = Database::getInstance();
  }
}