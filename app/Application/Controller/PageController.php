<?php

namespace App\Application\Controller;

use App\Application\View\View;
use App\Application\Controller\BaseController;

class PageController extends BaseController
{
  public function home() : void {
    $db = $this->db;
    $users = $db->fetchAll("SELECT * FROM users");
    View::show('page/home', ['users'=>$users]);
  }
  public function about() : void {
    echo View::show('page/about');
  }
}
