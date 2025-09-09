<?php
namespace App\Application\Controller;

class LibraryController extends ApiController 
{
  public function get() {
    $db = $this->db;
    $user = $db->fetchAll("SELECT * FROM users");
  }
}