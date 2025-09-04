<?php

namespace App\Application\Controller;

use App\Application\View\View;

class PageController {
  public function home() : void {
      echo View::show('page/home');
  }
  public function about() : void {
    echo View::show('page/about');
  }
}
