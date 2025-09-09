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

  public function toJson(object|array|null $data):string {
    return json_encode(['result' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }
}