<?php

namespace App\Router;

interface RoutInterface {
  public function handle(array $routs) : void;
}