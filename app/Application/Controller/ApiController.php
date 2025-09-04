<?php
namespace App\Application\Controller;


abstract class ApiController {
  public function __construct(){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Methods: GET");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
  }
}